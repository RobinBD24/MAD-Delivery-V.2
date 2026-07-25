@extends('layouts.app')
@section('title', $product->name)
@section('content')
<div class="max-w-2xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-3xl font-black font-condensed mb-2">{{ $product->name }}</h1>
    <p class="text-[#a0a0b0] mb-6">{{ $product->category }} — ৳{{ number_format($product->price, 2) }}</p>
    <p class="mb-6">{{ $product->description ?? 'Delicious item from MAD Delivery.' }}</p>

    <form action="{{ url('/cart/add') }}" method="POST" class="flex gap-3">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="name" value="{{ $product->name }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        <input type="number" name="qty" value="1" min="1" class="w-20 p-2 rounded bg-[#0c0c0e] border border-white/10">
        <button type="submit" class="bg-[#e8192c] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#b01020]">Add to Cart</button>
    </form>
</div>
@endsection
