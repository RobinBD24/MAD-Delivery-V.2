@extends('layouts.app')
@section('title', 'Admin Orders')
@section('content')
<h1 class="text-3xl font-black font-condensed mb-8">Orders</h1>
<div class="bg-[#17171d] border border-white/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#23232e] text-[#a0a0b0]"><tr><th class="text-left px-6 py-3">ID</th><th>Customer</th><th>Branch</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($orders as $o)
            <tr class="border-t border-white/5">
                <td class="px-6 py-3"><a href="{{ route('admin.orders.show', $o) }}" class="text-[#e8192c] hover:underline">#{{ $o->id }}</a></td>
                <td class="px-6 py-3">{{ $o->customer_name }}</td>
                <td class="px-6 py-3">{{ $o->branch }}</td>
                <td class="px-6 py-3">৳{{ number_format($o->total_amount, 2) }}</td>
                <td class="px-6 py-3">{{ $o->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
