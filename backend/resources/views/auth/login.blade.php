@extends('layouts.app')
@section('title', 'Log In — MAD Delivery')
@section('content')

<style>
:root {
  --mad-red:#e8192c;
  --mad-dark-red:#b01020;
  --cheez-gold:#f5a623;
  --cheez-dark:#c47d0a;
  --bg:#0c0c0e;
  --bg2:#111115;
  --surface:#1c1c24;
  --surface2:#23232e;
  --text-primary:#f0f0f2;
  --text2:#a0a0b0;
  --text3:#606070;
  --radius-card:12px;
  --radius-lg:20px;
  --shadow-card:0 4px 24px #00000080;
}
.login-page-body { background: linear-gradient(135deg, #0c0c0e 60%, #1a1008 100%); min-height: 100vh; }
.login-glow-orb { position: fixed; top: 10%; right: 5%; width: 320px; height: 320px; background: radial-gradient(circle, rgba(245,166,35,0.18) 0%, rgba(245,166,35,0) 70%); border-radius: 50%; pointer-events: none; z-index: 0; }
.login-glow-orb-2 { position: fixed; bottom: 10%; left: 5%; width: 260px; height: 260px; background: radial-gradient(circle, rgba(232,25,44,0.12) 0%, rgba(232,25,44,0) 70%); border-radius: 50%; pointer-events: none; z-index: 0; }
</style>

<div class="login-glow-orb"></div>
<div class="login-glow-orb-2"></div>

<div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-12">
  <div class="max-w-6xl w-full grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">

    <!-- Left: Tracking / Brand -->
    <div class="text-[#f0f0f2] mt-4 lg:mt-16">
      <div class="flex items-center gap-2 mb-2">
        <span class="inline-flex items-center gap-1.5 bg-[#e8192c]/10 text-[#e8192c] text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full border border-[#e8192c]/20">
          <span class="w-1.5 h-1.5 rounded-full bg-[#e8192c] animate-pulse"></span>
          Live Tracking
        </span>
      </div>
      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black font-condensed tracking-tight leading-[1.1] mb-4">
        Your order is already<br>on its way.
      </h1>
      <p class="text-[#a0a0b0] text-lg mb-10">Fast. Secure. Reliable.</p>

      <!-- Tracking Cards -->
      <div class="grid grid-cols-3 gap-3 mb-8">
        <div class="bg-[#17171d]/80 backdrop-blur-md border border-white/10 rounded-2xl p-4 text-center">
          <div class="text-2xl font-black font-condensed text-[#f5a623]">12 min</div>
          <div class="text-[11px] text-[#a0a0b0] mt-1">avg. delivery</div>
        </div>
        <div class="bg-[#17171d]/80 backdrop-blur-md border border-white/10 rounded-2xl p-4 text-center">
          <div class="text-2xl font-black font-condensed text-[#e8192c]">4.9 ★</div>
          <div class="text-[11px] text-[#a0a0b0] mt-1">rider rating</div>
        </div>
        <div class="bg-[#17171d]/80 backdrop-blur-md border border-white/10 rounded-2xl p-4 text-center">
          <div class="text-sm font-bold text-[#f0f0f2]">On the Way</div>
          <div class="text-[10px] text-[#606070] mt-1">current status</div>
        </div>
      </div>

      <!-- Mobile Mockup -->
      <div class="relative max-w-xs mx-auto">
        <div class="bg-[#111115] rounded-[28px] border border-white/10 shadow-2xl overflow-hidden relative">
          <div class="bg-gradient-to-br from-[#23232e] to-[#17171d] p-5 pb-16">
            <div class="flex items-center justify-between mb-4">
              <span class="text-xs font-bold tracking-widest text-[#f0f0f2]">MAD DELIVERY</span>
              <span class="text-[10px] text-[#f5a623] font-bold">LIVE</span>
            </div>
            <h3 class="text-lg font-bold text-[#f0f0f2] mb-1">Order on the<br>"On the Way"</h3>
            <p class="text-xs text-[#606070] mb-4">Estimated arrival in 12 min</p>
            <div class="relative h-44 rounded-xl overflow-hidden shadow-inner">
              <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" alt="Rider" class="w-full h-full object-cover opacity-80" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0c0c0e]/80 via-transparent to-transparent"></div>
              <div class="absolute bottom-3 left-3 bg-[#e8192c] text-white text-[10px] font-black px-2.5 py-0.5 rounded-md shadow-lg">MAD</div>
              <div class="absolute bottom-3 right-3 bg-black/60 text-[#f5a623] text-[10px] font-bold px-2 py-0.5 rounded-md backdrop-blur-md">12 min</div>
            </div>
          </div>
          <!-- Bottom Steps -->
          <div class="absolute bottom-0 left-0 right-0 bg-[#111115]/95 backdrop-blur-xl border-t border-white/5 px-5 py-3 flex justify-between items-center">
            <div class="text-center">
              <div class="w-7 h-7 rounded-full bg-[#e8192c] text-white text-[10px] font-black flex items-center justify-center mx-auto mb-0.5">1</div>
              <span class="text-[9px] text-[#a0a0b0]">Confirmed</span>
            </div>
            <div class="text-center">
              <div class="w-7 h-7 rounded-full bg-[#23232e] text-[#a0a0b0] text-[10px] font-black flex items-center justify-center mx-auto mb-0.5">2</div>
              <span class="text-[9px] text-[#a0a0b0]">Preparing</span>
            </div>
            <div class="text-center relative">
              <div class="absolute -top-2.5 left-1/2 -translate-x-1/2 bg-[#f5a623] text-[#0c0c0e] text-[9px] font-black px-1.5 py-0.5 rounded-full shadow-md">LIVE</div>
              <div class="w-7 h-7 rounded-full bg-[#f5a623] text-[#0c0c0e] text-[10px] font-black flex items-center justify-center mx-auto mb-0.5">3</div>
              <span class="text-[9px] text-[#f0f0f2]">On the Way</span>
            </div>
            <div class="text-center">
              <div class="w-7 h-7 rounded-full bg-[#23232e] text-[#a0a0b0] text-[10px] font-black flex items-center justify-center mx-auto mb-0.5">4</div>
              <span class="text-[9px] text-[#a0a0b0]">Delivered</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: Login -->
    <div class="bg-[#17171d]/70 backdrop-blur-2xl border border-white/[0.08] rounded-[28px] p-8 sm:p-10 shadow-2xl relative overflow-hidden">
      <!-- Glow behind form -->
      <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#e8192c]/10 rounded-full blur-3xl pointer-events-none"></div>
      <div class="relative z-10">
        <h2 class="text-3xl font-black font-condensed text-[#f0f0f2] mb-1">Welcome back</h2>
        <p class="text-[#a0a0b0] text-sm mb-8">Sign in to track your next order.</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
          @csrf

          <div>
            <label for="email" class="block text-xs font-bold text-[#a0a0b0] uppercase tracking-wider mb-2">Mobile number</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#606070]">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13 1 .39 1.96.74 2.85a2 2 0 0 1-.45 2.11L6.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.89.35 1.85.61 2.85.74a2 2 0 0 1 1.72 2Z"/></svg>
              </span>
              <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus class="w-full pl-10 pr-4 py-3.5 rounded-xl bg-[#0c0c0e] border border-white/10 text-[#f0f0f2] placeholder-[#606070] focus:outline-none focus:ring-2 focus:ring-[#e8192c]/40 focus:border-[#e8192c] transition text-sm" placeholder="+880 1XXX XXX XXX" />
            </div>
          </div>

          <div>
            <label for="password" class="block text-xs font-bold text-[#a0a0b0] uppercase tracking-wider mb-2">Password</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#606070]">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              </span>
              <input id="password" type="password" name="password" required class="w-full pl-10 pr-4 py-3.5 rounded-xl bg-[#0c0c0e] border border-white/10 text-[#f0f0f2] placeholder-[#606070] focus:outline-none focus:ring-2 focus:ring-[#e8192c]/40 focus:border-[#e8192c] transition text-sm" placeholder="Enter your password" />
            </div>
          </div>

          <div class="flex items-center justify-between">
            <label class="flex items-center gap-2.5 cursor-pointer select-none">
              <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/10 bg-[#0c0c0e] text-[#e8192c] focus:ring-[#e8192c]/40" />
              <span class="text-xs text-[#a0a0b0]">Remember me</span>
            </label>
            <a href="#" class="text-xs text-[#f5a623] hover:text-[#e8192c] transition font-medium">Forgot password?</a>
          </div>

          <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#e8192c] to-[#b01020] text-white font-bold text-sm tracking-wide shadow-[0_4px_20px_#e8192c40] hover:shadow-[0_6px_28px_#e8192c60] transition transform active:scale-[0.99]">
            Log in
          </button>
        </form>

        <div class="relative my-6">
          <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-white/10"></div></div>
          <div class="relative flex justify-center"><span class="bg-[#17171d] px-3 text-[10px] font-bold text-[#606070] uppercase tracking-widest">OR CONTINUE WITH</span></div>
        </div>

        <div class="flex gap-3">
          <a href="#" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl bg-[#23232e] border border-white/5 text-[#f0f0f2] text-xs font-semibold hover:bg-[#2a2a36] transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f0f0f2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            Facebook
          </a>
          <a href="#" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl bg-[#23232e] border border-white/5 text-[#f0f0f2] text-xs font-semibold hover:bg-[#2a2a36] transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f0f0f2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            Gmail
          </a>
        </div>

        <p class="text-center text-xs text-[#606070] mt-6">
          Don't have an account?
          <a href="{{ url('/register') }}" class="text-[#e8192c] hover:text-[#f5a623] transition font-semibold">Register now</a>
        </p>
      </div>
    </div>
  </div>
</div>

@endsection
