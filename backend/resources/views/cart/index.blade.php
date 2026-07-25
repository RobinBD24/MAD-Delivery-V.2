@extends('layouts.app')
@section('title', 'Cart')
@section('content')
<h1 class="text-3xl font-black font-condensed mb-8">Your Cart</h1>
@if(empty($cart))
<p class="text-[#a0a0b0]">Cart is empty. <a href="{{ url('/menu') }}" class="text-[#e8192c]">Browse Menu</a></p>
@else
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]">
            <tr><th class="text-left px-6 py-3">Item</th><th>Qty</th><th>Price</th><th>Action</th></tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $line = $item['price'] * $item['qty']; $total += $line; @endphp
            <tr class="border-t border-white/5">
                <td class="px-6 py-3">{{ $item['name'] ?? 'Item' }}</td>
                <td class="px-6 py-3">{{ $item['qty'] }}</td>
                <td class="px-6 py-3">৳{{ number_format($line, 2) }}</td>
                <td class="px-6 py-3">
                    <form method="POST" action="{{ url('/cart/remove') }}" class="inline">@csrf<input type="hidden" name="product_id" value="{{ $id }}"><button class="text-red-400 hover:text-red-600">Remove</button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="px-6 py-4 flex justify-between items-center bg-[#111115]/40">
        <span class="font-bold">Total: ৳{{ number_format($total, 2) }}</span>
        <a href="{{ url('/checkout') }}" class="bg-[#e8192c] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#b01020]">Checkout</a>
    </div>
</div>
@endif
@endsection
