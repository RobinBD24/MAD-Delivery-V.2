@extends('layouts.app')
@section('title', 'Branch Manager Dashboard')
@section('content')
<h1 class='text-3xl font-black font-condensed mb-6'>Branch Manager Dashboard</h1>
<div class="grid md:grid-cols-3 gap-6">
    <a href="{{ url('branch-manager/orders') }}" class="p-6 bg-[#17171d] rounded-2xl border border-white/10 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#f5a623]">Orders</h3>
        <p class="text-sm text-[#a0a0b0]">Manage orders & delivery flow</p>
    </a>
    <a href="{{ url('branch-manager/delivery-config') }}" class="p-6 bg-[#17171d] rounded-2xl border border-white/10 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#e8192c]">Delivery Zone</h3>
        <p class="text-sm text-[#a0a0b0]">Configure zones & pickup points</p>
    </a>
    <a href="{{ url('branch-manager/table-layout') }}" class="p-6 bg-[#17171d] rounded-2xl border border-white/10 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#f5a623]">Table Layout</h3>
        <p class="text-sm text-[#a0a0b0]">Manage seats & reservations</p>
    </a>
    <a href="{{ url('branch-manager/employees') }}" class="p-6 bg-[#17171d] rounded-2xl border border-white/10 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#e8192c]">Employees</h3>
        <p class="text-sm text-[#a0a0b0]">Staff & attendance</p>
    </a>
    <a href="{{ url('branch-manager/estimated-time') }}" class="p-6 bg-[#17171d] rounded-2xl border border-white/10 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#f5a623]">Prep Time</h3>
        <p class="text-sm text-[#a0a0b0]">Set estimated order time</p>
    </a>
    <a href="{{ url('branch-manager/bookings') }}" class="p-6 bg-[#17171d] rounded-2xl border border-white/10 hover:border-[#f5a623] transition">
        <h3 class="text-xl font-bold text-[#e8192c]">Bookings</h3>
        <p class="text-sm text-[#a0a0b0]">Table & Ramadan reservations</p>
    </a>
</div>
@endsection
