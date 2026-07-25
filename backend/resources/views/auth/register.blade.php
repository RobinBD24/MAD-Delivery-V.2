@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="max-w-md mx-auto bg-[#17171d] border border-white/10 rounded-2xl p-8">
    <h2 class="text-2xl font-bold font-condensed mb-6">Create Account</h2>
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <label class="block text-sm mb-1">Name</label>
        <input type="text" name="name" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Email</label>
        <input type="email" name="email" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Phone</label>
        <input type="text" name="phone" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Password</label>
        <input type="password" name="password" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-4" required>

        <label class="block text-sm mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full p-3 rounded bg-[#0c0c0e] border border-white/10 mb-6" required>

        <button type="submit" class="w-full bg-[#e8192c] text-white py-3 rounded-lg font-bold hover:bg-[#b01020]">Register</button>
    </form>
</div>
@endsection
