@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
<h1 class="text-3xl font-black font-condensed mb-8">Checkout</h1>
@if(empty($cart))
<p class="text-[#a0a0b0]">Cart is empty. <a href="{{ url('/menu') }}" class="text-[#e8192c]">Browse Menu</a></p>
@else
<form method="POST" action="{{ url('/checkout') }}" class="max-w-xl bg-[#17171d] border border-white/10 rounded-2xl p-8">
    @csrf
    <label class="block text-sm mb-1">Full Name</label>
    <input type="text" name="customer_name" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required value="{{ auth()->user()->name ?? '' }}">

    <label class="block text-sm mb-1">Phone</label>
    <input type="text" name="customer_phone" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required value="{{ auth()->user()->phone ?? '' }}">

    <label class="block text-sm mb-1">Delivery Address</label>
    <textarea name="delivery_address" rows="3" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required></textarea>

    <label class="block text-sm mb-1">Branch</label>
    <select name="branch" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>
        <option>Banani</option><option>Gulshan</option><option>Dhanmondi</option><option>Uttara</option><option>Mirpur</option>
    </select>

    <label class="block text-sm mb-1">Payment Method</label>
    <select name="payment_method" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-6">
        <option value="cash_on_delivery">Cash on Delivery</option>
        <option value="bkash">bKash</option>
        <option value="stripe">Card (Stripe)</option>
    </select>

    <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Place Order</button>
</form>
@endif
@endsection
