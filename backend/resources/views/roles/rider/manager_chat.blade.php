@extends('layouts.app')
@section('title', 'Rider — Manager Chat')
@section('content')
<h1 class="text-2xl font-black font-condensed mb-6">Branch Manager Chat</h1>
@if($branch)
<div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6">
    <h3 class="text-lg font-bold text-[#f5a623]">Branch: {{ $branch->name }}</h3>
    <p class="text-xs text-[#a0a0b0]">Dedicated chat session with branch manager. Real-time updates.</p>
</div>
@endif
<div class="bg-[#17171d] border border-white/10 rounded-2xl p-6 mb-6 min-h-[300px]">
    @if(isset($session) && $session)
        @if($session->messages && $session->messages->count() > 0)
            @foreach($session->messages as $msg)
                <div class="mb-3 p-3 rounded-lg bg-[#23232e] text-sm">
                    <span class="font-bold text-[#f5a623]">{{ $msg->sender_id == auth()->id() ? 'You' : 'Manager' }}</span>
                    <span class="text-xs text-[#606070]">{{ $msg->created_at }}</span>
                    <p class="mt-1">{{ $msg->message }}</p>
                </div>
            @endforeach
        @else
            <p class="text-sm text-[#a0a0b0]">No messages yet. Start the conversation below.</p>
        @endif
    @else
        <p class="text-sm text-[#a0a0b0]">No active chat session. Select a branch first.</p>
    @endif
</div>
<form method="POST" action="{{ url('rider/send-manager-message') }}" class="flex gap-3">
    @csrf
    <input type="text" name="message" placeholder="Type message..." class="flex-1 p-3 rounded bg-[#0c0c0e] border border-white/10" required>
    <button type="submit" class="bg-[#e8192c] text-white px-6 rounded-lg font-bold">Send</button>
</form>
@endsection
