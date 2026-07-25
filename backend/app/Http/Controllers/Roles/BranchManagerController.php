<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\TableLayout;
use App\Models\TableReservation;
use App\Models\RamadanReservation;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;

class BranchManagerController extends Controller
{
    public function index() {
        // Assume branch manager linked to a branch via user profile or session
        $branch = Branch::first();
        return view('roles.branch_manager.dashboard', compact('branch'));
    }

    public function orders() { return view('roles.branch_manager.orders'); }
    public function riders() { return view('roles.branch_manager.riders'); }

    public function products() {
        $branch = Branch::first();
        $products = \App\Models\Product::where('branch_id', $branch ? $branch->id : null)->get();
        return view('roles.branch_manager.products', compact('products', 'branch'));
    }

    public function attendance() {
        $branch = Branch::first();
        $attendance = $branch ? $branch->employees()->with('user')->get() : collect();
        return view('roles.branch_manager.attendance', compact('attendance', 'branch'));
    }

    public function complaints() { return view('roles.branch_manager.complaints'); }
    public function reports() { return view('roles.branch_manager.reports'); }
    public function bookings() { return view('roles.branch_manager.bookings'); }

    // Delivery Zone & Estimated Preparation Time
    public function deliveryConfig() {
        $branch = Branch::first();
        return view('roles.branch_manager.delivery_config', compact('branch'));
    }

    public function updateDeliveryConfig(Request $request) {
        $branch = Branch::first();
        if ($branch) {
            $branch->update([
                'delivery_zone' => $request->input('delivery_zone'),
                'pickup_points' => $request->input('pickup_points'),
            ]);
        }
        return redirect()->back()->with('success', 'Delivery config updated.');
    }

    // Estimated Preparation Time (stored as meta/config per branch)
    public function estimatedTime() {
        $branch = Branch::first();
        $time = session('branch_estimated_time', '30');
        return view('roles.branch_manager.estimated_time', compact('branch', 'time'));
    }

    public function updateEstimatedTime(Request $request) {
        session(['branch_estimated_time' => $request->input('estimated_minutes')]);
        return redirect()->back()->with('success', 'Estimated preparation time updated for new orders.');
    }

    // Table Layout Management
    public function tableLayout() {
        $branch = Branch::first();
        $tables = $branch ? $branch->tableLayouts()->get() : collect();
        return view('roles.branch_manager.table_layout', compact('branch', 'tables'));
    }

    public function storeTableLayout(Request $request) {
        $branch = Branch::first();
        if ($branch) {
            TableLayout::create([
                'branch_id' => $branch->id,
                'table_name' => $request->input('table_name'),
                'table_identifier' => $request->input('table_identifier'),
                'seat_capacity' => $request->input('seat_capacity', 4),
                'status' => $request->input('status', 'available'),
                'location_description' => $request->input('location_description'),
            ]);
        }
        return redirect()->back()->with('success', 'Table added.');
    }

    public function updateTableLayout(Request $request, $id) {
        $table = TableLayout::findOrFail($id);
        $table->update($request->only(['table_name', 'table_identifier', 'seat_capacity', 'status', 'location_description']));
        return redirect()->back()->with('success', 'Table updated.');
    }

    // Reservations Management (accept/reject with reason)
    public function reservations() {
        $branch = Branch::first();
        $reservations = $branch ? TableReservation::where('branch_id', $branch->id)->get() : collect();
        return view('roles.branch_manager.reservations', compact('reservations', 'branch'));
    }

    public function updateReservation(Request $request, $id) {
        $res = TableReservation::findOrFail($id);
        $res->update([
            'status' => $request->input('status'),
            'rejection_reason' => $request->input('rejection_reason'),
        ]);
        return redirect()->back()->with('success', 'Reservation updated.');
    }

    // Ramadan Reservations
    public function ramadanReservations() {
        $branch = Branch::first();
        $reservations = $branch ? RamadanReservation::where('branch_id', $branch->id)->get() : collect();
        return view('roles.branch_manager.ramadan_reservations', compact('reservations', 'branch'));
    }

    public function updateRamadanReservation(Request $request, $id) {
        $res = RamadanReservation::findOrFail($id);
        $res->update($request->only(['status', 'payment_status', 'notes', 'advance_payment_required']));
        return redirect()->back()->with('success', 'Ramadan reservation updated.');
    }

    // Employee / Staff Management
    public function employees() {
        $branch = Branch::first();
        $employees = $branch ? $branch->employees()->get() : collect();
        return view('roles.branch_manager.employees', compact('employees', 'branch'));
    }

    public function storeEmployee(Request $request) {
        $branch = Branch::first();
        if ($branch) {
            Employee::create([
                'branch_id' => $branch->id,
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
                'photo_path' => $request->input('photo_path'),
                'role' => $request->input('role'),
                'join_date' => $request->input('join_date'),
                'is_active' => $request->has('is_active'),
            ]);
        }
        return redirect()->back()->with('success', 'Employee added.');
    }

    public function updateEmployee(Request $request, $id) {
        $emp = Employee::findOrFail($id);
        $emp->update($request->only(['name', 'contact', 'photo_path', 'role', 'join_date', 'is_active']));
        return redirect()->back()->with('success', 'Employee updated.');
    }

    // Chat / Communication (dedicated session with rider/customer)
    public function chatSessions() {
        return view('roles.branch_manager.chat_sessions');
    }
}
