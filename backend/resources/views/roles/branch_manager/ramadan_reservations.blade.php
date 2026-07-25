@extends('layouts.app')
@section('title', 'Ramadan Reservations')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Ramadan Reservations</h1>
@if($branch)
<p class="text-sm text-[#a0a0b0] mb-4">Branch: {{ $branch->name }} ({{ $branch->brand_type }})</p>
@endif
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]">
            <tr><th class="px-4 py-3">Date</th><th>Slot</th><th>Table</th><th>Guests</th><th>Platter</th><th>Payment</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @if($reservations && $reservations->count() > 0)
                @foreach($reservations as $r)
                <tr class="border-t border-white/5">
                    <td class="px-4 py-2">{{ $r->reservation_date }}</td>
                    <td class="px-4 py-2">{{ $r->time_slot }}</td>
                    <td class="px-4 py-2">{{ $r->tableLayout ? $r->tableLayout->table_name : 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $r->guest_count }}</td>
                    <td class="px-4 py-2">{{ $r->platter_name ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $r->payment_status }}</td>
                    <td class="px-4 py-2">
                        <form method="POST" action="{{ url('branch-manager/update-ramadan-reservation/'.$r->id) }}" class="flex gap-2">
                            @csrf @method('PUT')
                            <select name="status" class="p-1 rounded bg-[#0c0c0e] border border-white/10 text-xs">
                                <option value="pending" {{ $r->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $r->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $r->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ $r->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <select name="payment_status" class="p-1 rounded bg-[#0c0c0e] border border-white/10 text-xs">
                                <option value="pending" {{ $r->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $r->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="failed" {{ $r->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                            <button type="submit" class="text-xs bg-[#f5a623] text-black px-2 py-1 rounded">Save</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="7" class="px-4 py-3 text-sm text-[#a0a0b0]">No Ramadan reservations.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
