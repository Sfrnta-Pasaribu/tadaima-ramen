@extends('layouts.app')

@section('content')
<div class="bg-[#0f0f0f] text-white min-h-screen">
    
    <section class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/about-hero.jpg') }}" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0f0f0f]/60 to-[#0f0f0f]"></div>
        </div>
        
        <div class="relative z-10 text-center px-6">
            <span class="text-red-600 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Est. 2026</span>
            <h1 class="text-6xl md:text-8xl font-black italic uppercase leading-none">
                Tadaima <br> <span class="text-red-600">Ramen</span>
            </h1>
            <p class="mt-8 text-gray-400 text-lg md:text-xl max-w-2xl mx-auto italic font-light">
                "Sebuah pelukan hangat dalam bentuk semangkuk ramen."
            </p>
        </div>
    </section>

    <section class="py-24 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-black uppercase mb-8 border-l-4 border-red-600 pl-6 italic">
                        The Meaning of <br> <span class="text-red-600">"Tadaima"</span>
                    </h2>
                    <div class="space-y-6 text-gray-400 leading-relaxed text-lg">
                        <p>
                            Dalam tradisi Jepang, <span class="text-white italic">"Tadaima"</span> adalah kata pertama yang diucapkan saat seseorang melangkah masuk ke rumah setelah hari yang panjang. Artinya sederhana: <span class="text-white">"Saya pulang."</span>
                        </p>
                        <p>
                            Tadaima Ramen lahir dari filosofi tersebut. Kami percaya bahwa ramen bukan sekadar makanan cepat saji, melainkan ritual kehangatan. Kami ingin setiap pengunjung merasakan kenyamanan yang sama seperti saat mereka pulang ke rumah yang penuh cinta.
                        </p>
                        <p>
                            Dari kaldu yang dimasak perlahan selama 12 jam hingga mie yang dibuat segar setiap pagi, setiap elemen di Tadaima adalah janji kami untuk menyajikan kejujuran rasa di atas meja Anda.
                        </p>
                    </div>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-4 border-2 border-red-600/30 rounded-2xl group-hover:border-red-600 transition-colors duration-500"></div>
                    <img src="{{ asset('images/chef-action.jpg') }}" class="rounded-xl relative z-10 grayscale group-hover:grayscale-0 transition-all duration-700">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-zinc-900/50">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <div class="p-8">
                <div class="text-4xl mb-6 text-red-600">🍜</div>
                <h4 class="text-xl font-bold uppercase mb-4 tracking-widest">Handmade Noodles</h4>
                <p class="text-gray-400 text-sm">Mie kenyal yang dibuat secara artisan setiap hari tanpa bahan pengawet.</p>
            </div>
            <div class="p-8">
                <div class="text-4xl mb-6 text-red-600">🔥</div>
                <h4 class="text-xl font-bold uppercase mb-4 tracking-widest">12-Hour Broth</h4>
                <p class="text-gray-400 text-sm">Kaldu kental nan gurih yang diekstraksi dari bahan pilihan selama belasan jam.</p>
            </div>
            <div class="p-8">
                <div class="text-4xl mb-6 text-red-600">🎋</div>
                <h4 class="text-xl font-bold uppercase mb-4 tracking-widest">Local Freshness</h4>
                <p class="text-gray-400 text-sm">Bahan pelengkap segar yang diambil langsung dari petani lokal terbaik.</p>
            </div>
        </div>
    </section>

    <section class="py-24 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-black uppercase mb-16 italic">
                The Masterminds <br> <span class="text-red-600">Kelompok 13 PA-1</span>
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="group">
                    <div class="relative overflow-hidden rounded-2xl aspect-square mb-6">
                        <img src="{{ asset('images/team/member1.jpg') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <h5 class="text-xl font-bold uppercase tracking-widest">Nama Anggota 1</h5>
                    <p class="text-red-600 text-xs font-bold mt-2 uppercase tracking-[0.2em]">Project Leader / Backend</p>
                </div>

                <div class="group">
                    <div class="relative overflow-hidden rounded-2xl aspect-square mb-6">
                        <img src="{{ asset('images/team/member2.jpg') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <h5 class="text-xl font-bold uppercase tracking-widest">Nama Anggota 2</h5>
                    <p class="text-red-600 text-xs font-bold mt-2 uppercase tracking-[0.2em]">Frontend Developer</p>
                </div>

                <div class="group">
                    <div class="relative overflow-hidden rounded-2xl aspect-square mb-6">
                        <img src="{{ asset('images/team/member3.jpg') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-red-600/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <h5 class="text-xl font-bold uppercase tracking-widest">Nama Anggota 3</h5>
                    <p class="text-red-600 text-xs font-bold mt-2 uppercase tracking-[0.2em]">UI/UX Designer</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-red-600 text-white text-center">
        <h2 class="text-4xl font-black uppercase italic mb-8">Siap Untuk Pulang ke Kehangatan?</h2>
        <a href="{{ route('menu') }}" class="inline-block bg-white text-red-600 font-black px-12 py-4 rounded-full uppercase tracking-widest hover:bg-black hover:text-white transition-all transform hover:-translate-y-1">
            Lihat Menu Kami
        </a>
    </section>

</div>
@endsection