@extends('layouts.app')
@section('title', 'Delivery Zone')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Delivery Zone & Pickup Points</h1>
@if($branch)
<form method="POST" action="{{ url('branch-manager/update-delivery-config') }}">
    @csrf
    <div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
        <label class="block text-sm mb-1">Branch: {{ $branch->name }} ({{ $branch->brand_type }})</label>
    </div>
    <div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
        <label class="block text-sm mb-1">Delivery Zone Description / Allowed Areas</label>
        <textarea name="delivery_zone" rows="3" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-3">{{ $branch->delivery_zone ?? '' }}</textarea>
        <p class="text-xs text-[#a0a0b0]">Define which areas are covered. If outside zone, show nearest pickup point.</p>
    </div>
    <div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
        <label class="block text-sm mb-1">Nearest Pickup Points</label>
        <textarea name="pickup_points" rows="3" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10">{{ $branch->pickup_points ?? '' }}</textarea>
    </div>
    <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Save Delivery Config</button>
</form>
@endif
@endsection
