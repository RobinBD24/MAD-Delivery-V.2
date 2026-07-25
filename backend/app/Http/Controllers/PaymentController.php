<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PaymentController extends Controller
{
    // Stripe / bKash / PayPal stub
    public function process(Request $request) { return response()->json(['status' => 'stub', 'message' => 'Integrate Stripe/bKash/PayPal SDK']); }
    public function webhook(Request $request) { return response()->json(['status' => 'received']); }
    public function withdraw(Request $request) { return response()->json(['status' => 'pending']); }
}
