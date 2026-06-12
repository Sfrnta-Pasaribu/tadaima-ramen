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
            
            <nav x-data="{ open: false }" class="sticky top-0 w-full z-50 bg-black">
                <div class="container mx-auto px-6 py-4">
                    <div class="flex items-center justify-between">
                        
                        <a href="/" class="text-2xl font-black italic tracking-tighter text-red-600 drop-shadow-md">
                            TADAIMA-RAMEN<span class="text-white">.</span>
                        </a>

                        <div class="hidden md:flex items-center justify-center flex-1 gap-10 text-xs font-bold uppercase tracking-[0.2em]">
                            <a href="{{ route('home') }}" class="py-1 transition-all duration-300 drop-shadow-md {{ request()->routeIs('home') ? 'text-red-600 border-b-2 border-red-600' : 'text-white hover:text-red-600' }}">Beranda</a>
                            <a href="{{ route('menu') }}" class="py-1 transition-all duration-300 drop-shadow-md {{ request()->routeIs('menu') ? 'text-red-600 border-b-2 border-red-600' : 'text-white hover:text-red-600' }}">Menu</a>
                            <a href="/about" class="py-1 transition-all duration-300 drop-shadow-md {{ request()->is('about') ? 'text-red-600 border-b-2 border-red-600' : 'text-white hover:text-red-600' }}">Tentang</a>
                            <a href="/gallery" class="py-1 transition-all duration-300 drop-shadow-md {{ request()->is('gallery') ? 'text-red-600 border-b-2 border-red-600' : 'text-white hover:text-red-600' }}">Galeri</a>
                            <a href="{{ route('fasilitas') }}" class="py-1 transition-all duration-300 drop-shadow-md {{ request()->routeIs('fasilitas') ? 'text-red-600 border-b-2 border-red-600' : 'text-white hover:text-red-600' }}">Fasilitas</a>
                        </div>

                        <div class="flex items-center space-x-4">
                            
                            <div class="hidden md:flex items-center space-x-4">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="text-[10px] font-bold uppercase tracking-widest text-red-500 border border-red-500 px-3 py-1 rounded-full hover:bg-red-500 hover:text-white transition drop-shadow-md">Dasbor</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-[10px] font-bold uppercase tracking-widest text-white bg-red-600 px-5 py-2 rounded-full hover:bg-red-700 transition shadow-md">Login</a>
                                @endauth
                            </div>

                            <button @click="open = !open" class="md:hidden text-white focus:outline-none drop-shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                            </button>
                            
                        </div>
                    </div>
                </div>

                <div x-show="open" x-transition class="md:hidden bg-black/95 absolute top-full left-0 w-full p-6 space-y-4 text-center border-t border-white/10 shadow-2xl">
                    <a href="{{ route('home') }}" class="block font-bold tracking-[0.2em] uppercase text-sm transition-colors {{ request()->routeIs('home') ? 'text-red-600' : 'text-gray-200 hover:text-white' }}">Beranda</a>
                    <a href="{{ route('menu') }}" class="block font-bold tracking-[0.2em] uppercase text-sm transition-colors {{ request()->routeIs('menu') ? 'text-red-600' : 'text-gray-200 hover:text-white' }}">Menu</a>
                    <a href="/about" class="block font-bold tracking-[0.2em] uppercase text-sm transition-colors {{ request()->is('about') ? 'text-red-600' : 'text-gray-200 hover:text-white' }}">Tentang</a>
                    <a href="/gallery" class="block font-bold tracking-[0.2em] uppercase text-sm transition-colors {{ request()->is('gallery') ? 'text-red-600' : 'text-gray-200 hover:text-white' }}">Galeri</a>
                    <a href="{{ route('fasilitas') }}" class="block font-bold tracking-[0.2em] uppercase text-sm transition-colors {{ request()->routeIs('fasilitas') ? 'text-red-600' : 'text-gray-200 hover:text-white' }}">Fasilitas</a>
                    
                    <div class="pt-6 mt-4 border-t border-white/20">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-block text-[10px] font-bold uppercase tracking-widest text-red-500 border border-red-500 px-6 py-2 rounded-full hover:bg-red-500 hover:text-white transition mb-4">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-gray-400 font-bold hover:text-white uppercase tracking-[0.2em] text-xs">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="inline-block text-[10px] font-bold uppercase tracking-widest text-white bg-red-600 px-8 py-3 rounded-full hover:bg-red-700 transition shadow-md">Login</a>
                        @endauth
                    </div>
                </div>
            </nav>

            <main> @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            @include('layouts.footer')
            
        </div>
    </body>
</html>