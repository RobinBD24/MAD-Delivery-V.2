<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $pending = Order::where('status', 'pending')->count();
        $revenue = Order::where('status', 'delivered')->sum('total_amount');
        $orders = Order::latest()->limit(10)->get();
        return view('admin.dashboard', compact('pending', 'revenue', 'orders'));
    }
}
