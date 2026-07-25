@extends('layouts.app')
@section('title', 'Table Layout')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Table Layout Management</h1>
@if($branch)
<div class="mb-6">
    <h3 class="text-lg font-bold text-[#f5a623]">Branch: {{ $branch->name }}</h3>
</div>
<form method="POST" action="{{ url('branch-manager/store-table-layout') }}" class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
    @csrf
    <div class="grid md:grid-cols-4 gap-3 mb-4">
        <input type="text" name="table_name" placeholder="Table Name / ID" class="p-2 rounded bg-[#0c0c0e] border border-white/10" required>
        <input type="text" name="table_identifier" placeholder="Unique Identifier" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
        <input type="number" name="seat_capacity" placeholder="Seats (1-7)" class="p-2 rounded bg-[#0c0c0e] border border-white/10" min="1" max="20" value="4">
        <select name="status" class="p-2 rounded bg-[#0c0c0e] border border-white/10">
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
            <option value="out_of_service">Out of Service</option>
        </select>
    </div>
    <input type="text" name="location_description" placeholder="Location description" class="w-full p-2 rounded bg-[#0c0c0e] border border-white/10 mb-3">
    <button type="submit" class="bg-[#f5a623] text-black px-4 py-2 rounded font-bold">Add Table</button>
</form>

<div class="grid md:grid-cols-3 gap-4">
    @if($tables && $tables->count() > 0)
        @foreach($tables as $t)
        <div class="bg-[#17171d] border border-white/10 rounded-2xl p-4">
            <h4 class="font-bold">{{ $t->table_name }} ({{ $t->table_identifier ?? 'N/A' }})</h4>
            <p class="text-xs text-[#a0a0b0]">Capacity: {{ $t->seat_capacity }} | Status: <span class="capitalize font-bold text-[#f5a623]">{{ $t->status }}</span></p>
            <form method="POST" action="{{ url('branch-manager/update-table-layout/'.$t->id) }}" class="mt-3 flex gap-2">
                @csrf @method('PUT')
                <input type="hidden" name="table_name" value="{{ $t->table_name }}">
                <select name="status" class="p-1 rounded bg-[#0c0c0e] border border-white/10 text-xs">
                    <option value="available" {{ $t->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="occupied" {{ $t->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="out_of_service" {{ $t->status == 'out_of_service' ? 'selected' : '' }}>Out of Service</option>
                </select>
                <button type="submit" class="text-xs bg-[#e8192c] px-2 py-1 rounded">Update</button>
            </form>
        </div>
        @endforeach
    @else
        <p class="text-sm text-[#a0a0b0]">No tables configured yet.</p>
    @endif
</div>
@endif
@endsection
