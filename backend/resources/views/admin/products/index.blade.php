@extends('layouts.app')
@section('title', 'Admin Products')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-black font-condensed">Products</h1>
    <a href="{{ route('admin.products.create') }}" class="bg-[#e8192c] text-white px-4 py-2 rounded-lg font-bold">Add Product</a>
</div>
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]"><tr><th class="text-left px-6 py-3">Name</th><th>Category</th><th>Price</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($products as $p)
            <tr class="border-t border-white/5">
                <td class="px-6 py-3">{{ $p->name }}</td>
                <td class="px-6 py-3">{{ $p->category }}</td>
                <td class="px-6 py-3">৳{{ number_format($p->price, 2) }}</td>
                <td class="px-6 py-3 flex gap-2">
                    <a href="{{ route('admin.products.edit', $p) }}" class="text-blue-400">Edit</a>
                    <form method="POST" action="{{ route('admin.products.destroy', $p) }}" class="inline">@csrf @method('DELETE')<button class="text-red-400">Delete</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
