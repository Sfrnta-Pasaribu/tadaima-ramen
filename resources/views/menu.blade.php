@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')
    <div class="pt-32 pb-20 bg-[#0f0f0f] min-h-screen">
        <div class="max-w-6xl mx-auto p-6 lg:p-12">
            
            <a href="/" class="text-gray-500 hover:text-red-500 mb-8 inline-flex items-center gap-2 transition-colors font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Beranda
            </a>

            <div class="mb-12 border-l-4 border-red-600 pl-6">
                <h1 class="text-4xl font-black uppercase tracking-tighter text-white">
                    Menu Andalan <span class="text-red-600">Kami</span>
                </h1>
                <p class="text-gray-400 mt-2 font-medium">Dibuat dengan bahan segar setiap harinya untuk rasa yang otentik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($menus as $menu)
                <div class="bg-[#1b1b18] border border-white/5 rounded-3xl overflow-hidden shadow-xl hover:border-red-600/30 transition-all group">
                    
                    <div class="relative h-56 w-full overflow-hidden">
                        <div class="absolute top-4 right-4 z-10 bg-red-600 text-white font-bold px-4 py-1 rounded-full shadow-lg">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </div>

                        @if($menu->image)
                            <img src="{{ asset('images/' . $menu->image) }}" 
                                 alt="{{ $menu->name }}" 
                                 class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gray-800 text-7xl">
                                🍜
                            </div>
                        @endif
                    </div>

                    <div class="p-8">
                        <h3 class="text-xl font-bold mb-3 uppercase tracking-tight text-white group-hover:text-red-500 transition-colors">
                            {{ $menu->name }}
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed line-clamp-3">
                            {{ $menu->description }}
                        </p>
                        
                        <a href="https://wa.me/628123456789" class="mt-6 block w-full text-center border border-gray-700 hover:bg-white hover:text-black text-white py-3 rounded-xl transition-all text-xs font-bold uppercase tracking-widest">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection