<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
            /* Khusus untuk menu agar lebih tegas */
            nav a {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav class="fixed w-full z-50 bg-zinc-950/90 backdrop-blur-sm border-b border-zinc-800">
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
                            <a href="/blog" class="hover:text-red-600 transition">Blog</a>
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

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            <footer class="bg-zinc-950 text-white pt-20 pb-10">
                <div class="container mx-auto px-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                        <div class="col-span-1 md:col-span-1">
                            <div class="text-2xl font-black italic tracking-tighter mb-6">
                                TADAIMA-RAMEN<span class="text-red-600">.</span>
                            </div>
                            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                                Membawa kehangatan resep otentik Jepang ke setiap mangkuk. Kami percaya bahwa ramen adalah bahasa universal untuk sebuah kenyamanan.
                            </p>
                            <div class="flex space-x-4">
                                <a href="https://www.instagram.com/tadaimaramen" target="_blank" class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center hover:bg-red-600 transition">
                                    <span class="text-xs text-white">IG</span>
                                </a>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold mb-6">Navigasi</h4>
                            <ul class="space-y-4 text-gray-400 text-sm">
                                <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                                <li><a href="/menu" class="hover:text-white transition">Daftar Menu</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold mb-6">Bantuan</h4>
                            <ul class="space-y-4 text-gray-400 text-sm">
                                <li><a href="#location" class="hover:text-white transition">Lokasi Kedai</a></li>
                                <li><a href="#" class="hover:text-white transition">Cara Pemesanan</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold mb-6">Hubungi Kami</h4>
                            <p class="text-gray-400 text-sm mb-6">Punya pertanyaan atau ingin reservasi tempat?</p>
                            <a href="https://wa.me/628123456789" target="_blank" class="inline-block w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-green-900/20">
                                WhatsApp Kami
                            </a>
                        </div>
                    </div>

                    <hr class="border-zinc-800 mb-10">

                    <div class="flex flex-col md:flex-row justify-between items-center text-gray-500 text-xs tracking-widest uppercase">
                        <p>&copy; 2026 TADAIMA RAMEN. ALL RIGHTS RESERVED.</p>
                        <p class="mt-4 md:mt-0 font-bold">
                            Project By <span class="text-white">Kelompok 13 PA-1</span>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
