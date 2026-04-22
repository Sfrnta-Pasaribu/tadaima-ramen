<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            nav a { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav class="fixed w-full z-50 bg-zinc-950/90 backdrop-blur-sm border-zinc-800">
                <div class="container mx-auto px-6 py-4">
                    <div class="flex items-center justify-between">
                        <a href="/" class="text-2xl font-black italic tracking-tighter text-white">
                            TADAIMA-RAMEN<span class="text-red-600">.</span>
                        </a>

                        <div class="hidden md:flex items-center justify-center flex-1 gap-10 text-xs font-bold uppercase tracking-[0.2em] text-gray-300">
                            <a href="{{ route('home') }}" class="hover:text-red-600 transition">Beranda</a>
                            <a href="{{ route('menu') }}" class="hover:text-red-600 transition">Menu</a>
                            <a href="/about" class="hover:text-red-600 transition">About</a>
                            <a href="/gallery" class="hover:text-red-600 transition">Gallery</a>
                            <a href="/facilities" class="hover:text-red-600 transition">Fasilitas</a>
                        </div>

                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-[10px] font-bold uppercase tracking-widest text-red-600 border border-red-600 px-3 py-1 rounded-full hover:bg-red-600 hover:text-white transition">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-white">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-[10px] font-bold uppercase tracking-widest text-white bg-red-600 px-5 py-2 rounded-full hover:bg-red-700 transition">Login</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <main>
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            @include('layouts.footer')
            
        </div>
    </body>
</html>