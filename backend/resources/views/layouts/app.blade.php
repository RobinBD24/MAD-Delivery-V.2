<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MAD Delivery')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Barlow+Condensed:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'DM Sans', sans-serif; background:#0c0c0e; color:#f0f0f2; }
        .font-condensed { font-family: 'Barlow Condensed', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <nav class="bg-[#111115]/90 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold font-condensed text-[#e8192c] tracking-tight">MAD Delivery</a>
            <div class="flex gap-6 text-sm font-medium text-[#a0a0b0]">
                <a href="{{ url('/menu') }}" class="hover:text-white">Menu</a>
                <a href="{{ url('/cart') }}" class="hover:text-white">Cart</a>
                @guest
                    <a href="{{ url('/login') }}" class="hover:text-white">Login</a>
                @else
                    <a href="{{ url('/orders') }}" class="hover:text-white">Orders</a>
                    <form method="POST" action="{{ url('/logout') }}" class="inline">@csrf<button class="hover:text-white">Logout</button></form>
                @endguest
            </div>
        </div>
    </nav>
    <main class="flex-1 max-w-6xl mx-auto px-4 py-10">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-900/40 border border-green-500/30 rounded text-green-200">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-4 p-3 bg-red-900/40 border border-red-500/30 rounded text-red-200">{{ $errors->first() }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="border-t border-white/10 bg-[#111115]/60 py-6 text-center text-sm text-[#606070]">
        MAD Delivery — Cheez! Pizza & Madchef — Dhaka
    </footer>
</body>
</html>
