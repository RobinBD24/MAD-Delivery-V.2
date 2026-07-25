@extends('layouts.app')
@section('title', 'Edit Variation')
@section('content')
<div class="max-w-md mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-xl font-black font-condensed mb-6">Edit Variation</h1>
    <form method="POST" action="{{ route('admin.products.variations.update', [$variation->product_id, $variation]) }}">
        @csrf @method('PUT')
        <label class="block text-sm mb-1">Size Name</label>
        <input type="text" name="size_name" value="{{ $variation->size_name }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-3" required>
        <label class="block text-sm mb-1">Price</label>
        <input type="number" step="0.01" name="price" value="{{ $variation->price }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-3" required>
        <div class="flex items-center mb-3">
            <input type="checkbox" name="is_available" class="mr-2" {{ $variation->is_available ? 'checked' : '' }}>
            <label>Available</label>
        </div>
        <label class="block text-sm mb-1">Disable Reason</label>
        <input type="text" name="reason" value="{{ $variation->reason }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4">
        <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold">Update</button>
    </form>
</div>
@endsection
