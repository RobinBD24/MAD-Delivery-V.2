@extends('layouts.app')
@section('title', 'MAD Delivery — Cheez! & Madchef')
@section('content')
<div class="text-center py-16">
    <h1 class="text-5xl md:text-7xl font-black font-condensed tracking-tight text-[#e8192c] mb-4">MAD Delivery</h1>
    <p class="text-xl text-[#a0a0b0] mb-8">Dhaka's premier food delivery platform</p>
    <a href="{{ url('/menu') }}" class="inline-block bg-[#e8192c] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#b01020] transition">Browse Menu</a>
</div>

<div class="grid md:grid-cols-2 gap-6 mt-12">
    @foreach($brands as $brand)
    <a href="{{ url('/menu') }}" class="block bg-[#17171d] border border-white/10 rounded-2xl p-8 hover:border-[#e8192c]/40 transition group">
        <h3 class="text-2xl font-bold font-condensed text-white mb-2 group-hover:text-[#e8192c]">{{ $brand['name'] }}</h3>
        <p class="text-[#a0a0b0]">{{ $brand['description'] }}</p>
    </a>
    @endforeach
</div>
@endsection
