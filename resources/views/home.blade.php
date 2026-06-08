@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    @php
        $hasInfo = false;
        if(isset($announcements)) {
            foreach($announcements as $info) {
                if(Str::contains(strtolower($info->type), 'info') || Str::contains(strtolower($info->type), 'jadwal')) {
                    $hasInfo = true;
                    break;
                }
            }
        }
    @endphp

    @if($hasInfo)
    <div class="fixed left-0 w-full flex items-center overflow-hidden" style="bottom: 0px; z-index: 9999; background-color: #111827; box-shadow: 0 -10px 25px -5px rgba(0, 0, 0, 0.3);">
        
        <div class="text-white text-xs md:text-sm font-black px-5 py-3 md:px-8 md:py-4 uppercase tracking-[0.2em] whitespace-nowrap z-10" style="background-color: #b91c1c; box-shadow: 5px 0 15px -3px rgba(0,0,0,0.8);">
            INFO TERKINI
        </div>
        
        <marquee behavior="scroll" direction="left" scrollamount="6" class="text-sm font-medium w-full pt-1 tracking-wide">
            @foreach($announcements as $info)
                @if(Str::contains(strtolower($info->type), 'info') || Str::contains(strtolower($info->type), 'jadwal'))
                    <span class="mx-12 inline-block" style="color: #e5e7eb;">
                        <span style="color: #ef4444; margin-right: 0.5rem; font-size: 1.125rem;">✦</span>
                        <span class="uppercase font-bold tracking-wider" style="color: #ffffff;">{{ $info->title }}</span> 
                        <span class="mx-3 font-light" style="color: #4b5563;">|</span> 
                        {{ $info->content }}
                    </span>
                @endif
            @endforeach
        </marquee>
    </div>
    @endif

    <section class="relative h-screen flex items-center justify-center overflow-hidden">

        <div class="absolute inset-0">
            <img src="{{ asset('images/suasana_tadaima-ramen.jpeg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative text-center px-4">
            <span class="text-red-500 font-bold tracking-[0.3em] uppercase mb-4 block">Authentic Japanese Taste</span>
            <h1 class="text-5xl md:text-7xl font-black text-white italic mb-5">TADAIMA RAMEN</h1>
            <h1 class="text-3xl md:text-4xl font-black text-white italic mb-3">ただいまラーメン</h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg mb-10 leading-relaxed">
                Menghadirkan kehangatan semangkuk ramen otentik langsung ke meja Anda. Dibuat dengan resep keluarga dan bahan berkualitas tinggi.
            </p>
        </div>
    </section>

    <section class="py-24 bg-zinc-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-zinc-900 italic">PROMO SPESIAL<span class="text-red-600">.</span></h2>
                <p class="text-gray-500 mt-2">Penawaran terbatas yang tidak boleh kamu lewatkan!</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($announcements as $promo)
                    @if(Str::contains(strtolower($promo->type), 'promo'))
                        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            @if($promo->image)
                                <img src="{{ asset($promo->image) }}" alt="{{ $promo->title }}" class="w-full h-56 object-cover">
                            @endif
                            <div class="p-8">
                                <span class="text-[10px] font-bold uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-full">{{ $promo->type }}</span>
                                <h3 class="text-2xl font-bold mt-4 text-zinc-800">{{ $promo->title }}</h3>
                                <p class="text-sm text-zinc-500 mt-3 leading-relaxed">{{ $promo->content }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
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
                <a href="/menu" class="text-red-600 font-bold border-b-2 border-red-600 pb-1 mt-4 md:mt-0 hover:text-red-700 transition">Lihat Semua Menu →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach($signatureMenus as $menu)
                <div class="group">
                    <div class="relative h-80 overflow-hidden rounded-[2.5rem] shadow-lg transition-transform duration-500 group-hover:-translate-y-3">
                        <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <h3 class="text-2xl font-bold text-white">{{ $menu->name }}</h3>
                            <p class="text-red-400 font-bold mt-1">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection