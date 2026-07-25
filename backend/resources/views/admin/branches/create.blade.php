@extends('layouts.app')
@section('title', 'Add Branch')
@section('content')
<div class="max-w-xl mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h1 class="text-2xl font-black font-condensed mb-6">Add Branch</h1>
    <form method="POST" action="{{ route('admin.branches.store') }}">
        @csrf
        <label class="block text-sm mb-1">Name</label>
        <input type="text" name="name" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Slug</label>
        <input type="text" name="slug" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Location</label>
        <input type="text" name="location" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Brand Type (Select)</label>
        <select name="brand_type" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>
            <option value="cheez">Cheez Only</option>
            <option value="madchef">Madchef Only</option>
            <option value="combined">Combined</option>
        </select>

        <label class="block text-sm mb-1">Delivery Zone (Text / JSON)</label>
        <textarea name="delivery_zone" rows="2" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" placeholder="Describe allowed zones, nearest pickup points"></textarea>

        <label class="block text-sm mb-1">Pickup Points</label>
        <textarea name="pickup_points" rows="2" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" placeholder="Nearest pickup info"></textarea>

        <div class="flex items-center mb-4">
            <input type="checkbox" name="is_active" id="is_active" checked class="mr-2 w-4 h-4">
            <label for="is_active">Active</label>
        </div>

        <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Save Branch</button>
    </form>
</div>
@endsection
