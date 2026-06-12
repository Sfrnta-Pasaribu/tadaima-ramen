<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Panel Admin - Tadaima Ramen')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-100 antialiased">

    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">
        
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col z-30 shadow-xl hidden md:flex">
            <div class="h-16 flex items-center px-6 bg-slate-950 border-b border-slate-800">
                <span class="text-xl font-black italic tracking-tighter text-red-500">
                    TADAIMA<span class="text-white">_ADMIN</span>
                </span>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-800 hover:text-white' }}">
                    <span>Dasbor</span>
                </a>
                <a href="{{ route('menu.index') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('menu.*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-800 hover:text-white' }}">
                    <span>Kelola Menu</span>
                </a>
                <a href="{{ route('announcement.index') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('announcement.*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-800 hover:text-white' }}">
                    <span>Promo & Berita</span>
                </a>
                <a href="{{ route('gallery.index') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-lg transition {{ request()->routeIs('gallery.*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-800 hover:text-white' }}">
                    <span>Galeri Foto</span>
                </a>
            </nav>

            <div class="p-4 bg-slate-950 border-t border-slate-800 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center font-bold text-white text-sm shadow">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white leading-none">{{ Auth::user()->name }}</p>
                        <a href="{{ route('profile.edit') }}" class="text-xs text-slate-500 hover:text-white transition">Kelola Akun</a>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-16 bg-white shadow-sm border-b flex items-center justify-between px-6 z-20">
                <div class="flex items-center space-x-4">
                    <h1 class="text-lg font-bold text-gray-800">@yield('header_title', 'Dasbor')</h1>
                </div>

                <div class="flex items-center space-x-4">
                    
                    <a href="{{ url('/') }}" class="text-sm font-bold text-slate-600 hover:text-blue-700 bg-slate-100 hover:bg-blue-50 px-4 py-2 rounded-lg transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        Lihat Website
                    </a>

                    <div class="h-6 w-px bg-gray-200"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-lg transition">
                            Logout
                        </button>
                    </form>

                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
                @yield('content')
            </main>

        </div>
    </div>
</body>
</html>