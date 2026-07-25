@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<h1 class="text-3xl font-black font-condensed mb-8">Admin Dashboard</h1>
<div class="grid md:grid-cols-3 gap-6 mb-8">
    <div class="bg-[#17171d] border border-white/10 rounded-2xl p-6">
        <h3 class="text-sm text-[#a0a0b0]">Pending Orders</h3>
        <p class="text-4xl font-black font-condensed text-[#e8192c]">{{ $pending }}</p>
    </div>
    <div class="bg-[#17171d] border border-white/10 rounded-2xl p-6">
        <h3 class="text-sm text-[#a0a0b0]">Revenue</h3>
        <p class="text-4xl font-black font-condensed text-white">৳{{ number_format($revenue, 2) }}</p>
    </div>
</div>

<h2 class="text-xl font-bold font-condensed mb-4">Recent Orders</h2>
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]"><tr><th class="text-left px-6 py-3">ID</th><th>Customer</th><th>Branch</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($orders as $o)
            <tr class="border-t border-white/5"><td class="px-6 py-3">#{{ $o->id }}</td><td class="px-6 py-3">{{ $o->customer_name }}</td><td class="px-6 py-3">{{ $o->branch }}</td><td class="px-6 py-3">{{ $o->status }}</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
