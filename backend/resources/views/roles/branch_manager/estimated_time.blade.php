@extends('layouts.app')
@section('title', 'Estimated Preparation Time')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Estimated Preparation Time</h1>
<form method="POST" action="{{ url('branch-manager/update-estimated-time') }}">
    @csrf
    <div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
        <label class="block text-sm mb-1">Current Estimated Time (minutes)</label>
        <input type="number" name="estimated_minutes" value="{{ session('branch_estimated_time', 30) }}" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-3">
        <p class="text-xs text-[#a0a0b0]">This applies to new orders. Once an order is confirmed, time locks.</p>
    </div>
    <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Save Estimated Time</button>
</form>
@endsection
