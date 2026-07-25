<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function index() {
        $branches = Branch::where('is_active', true)->get();
        $selectedBranch = session('rider_branch_id') ? Branch::find(session('rider_branch_id')) : null;
        return view('roles.rider.dashboard', compact('branches', 'selectedBranch'));
    }

    public function orders() { return view('roles.rider.orders'); }
    public function delivery() { return view('roles.rider.delivery'); }
    public function earnings() { return view('roles.rider.earnings'); }
    public function attendance() { return view('roles.rider.attendance'); }
    public function complaints() { return view('roles.rider.complaints'); }
    public function profile() { return view('roles.rider.profile'); }

    // Dynamic branch selection
    public function selectBranch(Request $request) {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
        ]);
        session(['rider_branch_id' => $request->input('branch_id')]);
        session(['rider_online' => true]);
        return redirect()->back()->with('success', 'Branch selected. You are now online for this branch.');
    }

    public function goOffline() {
        session(['rider_online' => false]);
        return redirect()->back()->with('success', 'You are now offline.');
    }

    public function switchBranch(Request $request) {
        session(['rider_online' => false]);
        session(['rider_branch_id' => $request->input('branch_id')]);
        session(['rider_online' => true]);
        return redirect()->back()->with('success', 'Branch switched. You are online for the new branch.');
    }

    // Dedicated chat session with branch manager
    public function managerChat() {
        $branchId = session('rider_branch_id');
        $branch = $branchId ? Branch::find($branchId) : null;
        $session = $branch ? ChatSession::where('session_type', 'rider_manager')
            ->where('branch_id', $branch->id)
            ->where('rider_id', auth()->user()->rider ? auth()->user()->rider->id : null)
            ->first() : null;
        return view('roles.rider.manager_chat', compact('branch', 'session'));
    }

    public function sendManagerMessage(Request $request) {
        $branchId = session('rider_branch_id');
        $message = $request->input('message');
        $branch = $branchId ? Branch::find($branchId) : null;
        if ($branch && $message) {
            $session = ChatSession::firstOrCreate(
                [
                    'session_type' => 'rider_manager',
                    'branch_id' => $branch->id,
                    'rider_id' => auth()->user()->rider ? auth()->user()->rider->id : null,
                    'manager_id' => $branch->manager ? $branch->manager->id : null,
                    'is_active' => true,
                ]
            );
            ChatMessage::create([
                'chat_session_id' => $session->id,
                'sender_id' => auth()->id(),
                'message' => $message,
                'is_read' => false,
            ]);
        }
        return redirect()->back()->with('success', 'Message sent.');
    }

    // Dedicated chat with customer when order received
    public function customerChat($orderId) {
        return view('roles.rider.customer_chat', compact('orderId'));
    }

    public function sendCustomerMessage(Request $request, $orderId) {
        $message = $request->input('message');
        if ($message) {
            $session = ChatSession::firstOrCreate(
                [
                    'session_type' => 'rider_customer',
                    'order_id' => $orderId,
                    'rider_id' => auth()->user()->rider ? auth()->user()->rider->id : null,
                    'customer_id' => auth()->id(), // placeholder; should be order customer
                    'is_active' => true,
                ]
            );
            ChatMessage::create([
                'chat_session_id' => $session->id,
                'sender_id' => auth()->id(),
                'message' => $message,
                'is_read' => false,
            ]);
        }
        return redirect()->back()->with('success', 'Message sent to customer.');
    }
}
