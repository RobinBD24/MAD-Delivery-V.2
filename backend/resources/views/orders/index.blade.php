@extends('layouts.app')
@section('title', 'My Orders')
@section('content')
<h1 class="text-3xl font-black font-condensed mb-8">My Orders</h1>
<div class="space-y-4">
    @forelse($orders as $order)
    <a href="{{ url('/orders/' . $order->id) }}" class="block bg-[#17171d] border border-white/10 rounded-xl p-5 hover:border-[#e8192c]/30 transition">
        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-bold">Order #{{ $order->id }}</h3>
                <p class="text-sm text-[#a0a0b0]">{{ $order->branch }} — {{ $order->status }}</p>
            </div>
            <span class="font-condensed font-bold">৳{{ number_format($order->total_amount, 2) }}</span>
        </div>
    </a>
    @empty
    <p class="text-[#a0a0b0]">No orders yet. <a href="{{ url('/menu') }}" class="text-[#e8192c]">Order something</a></p>
    @endforelse
</div>
@endsection
