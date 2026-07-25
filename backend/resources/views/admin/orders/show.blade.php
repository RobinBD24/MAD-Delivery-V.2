@extends('layouts.app')
@section('title', 'Order #' . $order->id)
@section('content')
<div class="max-w-2xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-2xl font-black font-condensed mb-2">Order #{{ $order->id }}</h1>
    <p class="text-sm text-[#a0a0b0] mb-2">{{ $order->customer_name }} — {{ $order->customer_phone }}</p>
    <p class="text-sm text-[#a0a0b0] mb-6">{{ $order->delivery_address }} — {{ $order->branch }}</p>

    <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="mb-6">
        @csrf @method('PUT')
        <div class="flex gap-3">
            <select name="status" class="p-3 rounded bg-[#0c0c0e] border border-white/10">
                @foreach(['pending','confirmed','preparing','delivered','cancelled'] as $s)
                <option value="{{ $s }}" @selected($order->status==$s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-[#e8192c] text-white px-4 py-2 rounded-lg font-bold">Update Status</button>
        </div>
    </form>

    <ul class="space-y-2">
        @foreach($order->items as $item)
        <li class="flex justify-between text-sm">
            <span>{{ $item->product ? $item->product->name : 'Product' }} × {{ $item->qty }}</span>
            <span>৳{{ number_format($item->price * $item->qty, 2) }}</span>
        </li>
        @endforeach
    </ul>
    <div class="border-t border-white/10 pt-4 mt-4 flex justify-between font-bold text-lg">
        <span>Total</span><span>৳{{ number_format($order->total_amount, 2) }}</span>
    </div>
</div>
@endsection
