@extends('layouts.app')
@section('title', 'Rider — Customer Chat')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Customer Chat — Order #{{ $orderId }}</h1>
<p class="text-sm text-[#a0a0b0] mb-6">Dedicated chat session with customer. Auto-closes after delivery complete.</p>
<div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6 min-h-[300px]">
    <p class="text-sm text-[#a0a0b0]">Real-time messages will appear here. Send delivery updates, traffic info, or issues.</p>
</div>
<form method="POST" action="{{ url('rider/send-customer-message/'.$orderId) }}" class="flex gap-3">
    @csrf
    <input type="text" name="message" placeholder="Update customer..." class="flex-1 p-3 rounded bg-[#0c0c0e] border border-white/10" required>
    <button type="submit" class="bg-[#f5a623] text-black px-6 rounded-lg font-bold">Send</button>
</form>
@endsection
