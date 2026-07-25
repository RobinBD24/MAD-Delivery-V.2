@extends('layouts.app')
@section('title', 'Menu')
@section('content')
<h1 class="text-3xl font-black font-condensed mb-8">Menu</h1>
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($products as $product)
    <div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden hover:border-[#e8192c]/30 transition">
        <div class="h-48 bg-gradient-to-br from-[#23232e] to-[#17171d] flex items-center justify-center">
            <span class="text-5xl">🍕</span>
        </div>
        <div class="p-5">
            <h3 class="text-lg font-bold font-condensed mb-1">{{ $product->name }}</h3>
            <p class="text-sm text-[#a0a0b0] mb-3">{{ $product->category }} — ৳{{ number_format($product->price, 2) }}</p>
            <a href="{{ url('/item/' . $product->slug) }}" class="text-[#e8192c] font-semibold text-sm hover:underline">View Details →</a>
        </div>
    </div>
    @empty
    <p class="text-[#a0a0b0]">No products available.</p>
    @endforelse
</div>
@endsection
