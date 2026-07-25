<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $qty = $request->input('qty', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += $qty;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'qty' => $qty,
                'name' => $request->input('name'),
                'price' => $request->input('price'),
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Added to cart');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('product_id');
        if (isset($cart[$id])) {
            $cart[$id]['qty'] = max(1, (int)$request->input('qty', 1));
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('product_id');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Removed from cart');
    }
}
