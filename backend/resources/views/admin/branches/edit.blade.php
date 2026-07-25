@extends('layouts.app')
@section('title', 'Edit Branch')
@section('content')
<div class="max-w-xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-2xl font-black font-condensed mb-6">Edit Branch: {{ $branch->name }}</h1>
    <form method="POST" action="{{ route('admin.branches.update', $branch) }}">
        @csrf @method('PUT')
        <label class="block text-sm mb-1">Name</label>
        <input type="text" name="name" value="{{ $branch->name }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Slug</label>
        <input type="text" name="slug" value="{{ $branch->slug }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Location</label>
        <input type="text" name="location" value="{{ $branch->location }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Brand Type</label>
        <select name="brand_type" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>
            <option value="cheez" {{ $branch->brand_type == 'cheez' ? 'selected' : '' }}>Cheez Only</option>
            <option value="madchef" {{ $branch->brand_type == 'madchef' ? 'selected' : '' }}>Madchef Only</option>
            <option value="combined" {{ $branch->brand_type == 'combined' ? 'selected' : '' }}>Combined</option>
        </select>

        <label class="block text-sm mb-1">Delivery Zone</label>
        <textarea name="delivery_zone" rows="2" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4">{{ $branch->delivery_zone }}</textarea>

        <label class="block text-sm mb-1">Pickup Points</label>
        <textarea name="pickup_points" rows="2" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4">{{ $branch->pickup_points }}</textarea>

        <div class="flex items-center mb-4">
            <input type="checkbox" name="is_active" id="is_active" class="mr-2 w-4 h-4" {{ $branch->is_active ? 'checked' : '' }}>
            <label for="is_active">Active</label>
        </div>

        <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Update Branch</button>
    </form>
</div>
@endsection
