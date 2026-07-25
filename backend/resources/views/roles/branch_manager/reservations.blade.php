@extends('layouts.app')
@section('title', 'Reservations')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Table Reservations</h1>
@if($reservations)
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]">
            <tr><th class="px-4 py-3">Table</th><th>Date</th><th>Time</th><th>Guests</th><th>Status</th><th>Reason</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($reservations as $r)
            <tr class="border-t border-white/5">
                <td class="px-4 py-2">{{ $r->tableLayout ? $r->tableLayout->table_name : 'N/A' }}</td>
                <td class="px-4 py-2">{{ $r->reservation_date }}</td>
                <td class="px-4 py-2">{{ $r->reservation_time }}</td>
                <td class="px-4 py-2">{{ $r->guest_count }}</td>
                <td class="px-4 py-2 capitalize">{{ $r->status }}</td>
                <td class="px-4 py-2">{{ $r->rejection_reason ?? '-' }}</td>
                <td class="px-4 py-2">
                    <form method="POST" action="{{ url('branch-manager/update-reservation/'.$r->id) }}" class="flex gap-2">
                        @csrf @method('PUT')
                        <select name="status" class="p-1 rounded bg-[#0c0c0e] border border-white/10 text-xs">
                            <option value="pending" {{ $r->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ $r->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ $r->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="confirmed" {{ $r->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        </select>
                        <input type="text" name="rejection_reason" placeholder="Reason" value="{{ $r->rejection_reason }}" class="p-1 rounded bg-[#0c0c0e] border border-white/10 text-xs w-24">
                        <button type="submit" class="text-xs bg-[#f5a623] text-black px-2 py-1 rounded">Save</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="text-sm text-[#a0a0b0]">No reservations found.</p>
@endif
@endsection
