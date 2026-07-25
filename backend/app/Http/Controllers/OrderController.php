<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('orders.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'delivery_address' => 'required|string|max:500',
            'branch' => 'required|string|max:100',
        ]);

        $cart = session()->get('cart', []);
        $total = 0;
        $items = [];
        foreach ($cart as $item) {
            $lineTotal = $item['price'] * $item['qty'];
            $total += $lineTotal;
            $items[] = [
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
            ];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'delivery_address' => $request->delivery_address,
            'branch' => $request->branch,
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method ?? 'cash_on_delivery',
        ]);

        foreach ($items as $item) {
            $order->items()->create($item);
        }

        session()->forget('cart');
        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }
}
