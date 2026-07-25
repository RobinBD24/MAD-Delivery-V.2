@extends('layouts.app')
@section('title', 'Order #' . $order->id)
@section('content')
<div class="max-w-2xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-2xl font-black font-condensed mb-2">Order #{{ $order->id }}</h1>
    <p class="text-[#a0a0b0] mb-6">Status: <span class="font-bold text-[#e8192c]">{{ $order->status }}</span></p>

    <h3 class="font-bold mb-3">Items</h3>
    <ul class="mb-6 space-y-2">
        @foreach($order->items as $item)
        <li class="flex justify-between text-sm">
            <span>{{ $item->product ? $item->product->name : 'Product' }} × {{ $item->qty }}</span>
            <span>৳{{ number_format($item->price * $item->qty, 2) }}</span>
        </li>
        @endforeach
    </ul>

    <div class="border-t border-white/10 pt-4 flex justify-between font-bold text-lg">
        <span>Total</span><span>৳{{ number_format($order->total_amount, 2) }}</span>
    </div>
</div>
@endsection
