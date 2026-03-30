@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/suasana_tadaima-ramen.jpeg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative text-center px-4">
            <span class="text-red-500 font-bold tracking-[0.3em] uppercase mb-4 block">Authentic Japanese Taste</span>
            <h1 class="text-6xl md:text-8xl font-black text-white italic mb-6">TADAIMA RAMEN</h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg mb-10 leading-relaxed">
                Menghadirkan kehangatan semangkuk ramen otentik langsung ke meja Anda. Dibuat dengan resep keluarga dan bahan berkualitas tinggi.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="/menu" class="bg-white text-black px-10 py-4 rounded-full font-bold hover:bg-red-600 hover:text-white transition-all shadow-xl">PESAN SEKARANG</a>
                <a href="/about" class="border border-white/30 text-white px-10 py-4 rounded-full font-bold hover:bg-white/10 transition-all">PELAJARI LEBIH LANJUT</a>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl font-black text-zinc-900 italic">SIGNATURE MENU</h2>
                    <p class="text-gray-500 mt-2">Pilihan terbaik dari dapur kami untuk Anda.</p>
                </div>
                <a href="/menu" class="text-red-600 font-bold border-b-2 border-red-600 pb-1 mt-4 md:mt-0">Lihat Semua Menu →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach($signatureMenus as $menu)
                <div class="group">
                    <div class="relative h-80 overflow-hidden rounded-[2.5rem] shadow-2xl transition-transform duration-500 group-hover:-translate-y-3">
                        <img src="{{ asset('images/' . $menu->image) }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-8 left-8">
                            <h3 class="text-2xl font-bold text-white">{{ $menu->name }}</h3>
                            <p class="text-red-400 font-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection