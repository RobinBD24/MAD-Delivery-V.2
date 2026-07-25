@extends('layouts.app')
@section('title', 'Branch Manager — Products')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">My Branch Products</h1>
<p class="text-sm text-[#a0a0b0] mb-4">Only products for your branch. Add, edit, activate/deactivate.</p>
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]"><tr><th class="px-4 py-3">Name</th><th>Category</th><th>Price</th><th>Available</th></tr></thead>
        <tbody>
            @if(isset($products) && $products->count() > 0)
                @foreach($products as $p)
                <tr class="border-t border-white/5">
                    <td class="px-4 py-2">{{ $p->name }}</td>
                    <td class="px-4 py-2">{{ $p->category }}</td>
                    <td class="px-4 py-2">৳{{ number_format($p->price, 2) }}</td>
                    <td class="px-4 py-2">{{ $p->is_available ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="4" class="px-4 py-3 text-sm text-[#a0a0b0]">No products for this branch.</td></tr>
            @endif
        </tbody>
    </table>
</div>
<a href="{{ route('admin.products.create') }}" class="inline-block mt-6 bg-[#e8192c] text-white px-4 py-2 rounded-lg font-bold">Add Product</a>
@endsection
