@extends('layouts.app')
@section('title', 'Branch Manager — Bookings')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Bookings</h1>
<div class="grid md:grid-cols-2 gap-6">
    <a href="{{ url('branch-manager/reservations') }}" class="bg-[#17171d] border border-white/10 rounded-2xl p-6 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#f5a623]">Table Reservations</h3>
        <p class="text-sm text-[#a0a0b0]">Manage regular reservations and approvals.</p>
    </a>
    <a href="{{ url('branch-manager/ramadan-reservations') }}" class="bg-[#17171d] border border-white/10 rounded-2xl p-6 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#e8192c]">Ramadan Reservations</h3>
        <p class="text-sm text-[#a0a0b0]">Special Ramadan booking and platters.</p>
    </a>
</div>
@endsection
