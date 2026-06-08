@extends('layouts.app')

@section('content')
<div class="bg-[#0f0f0f] text-white min-h-screen">
    
    <section class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/suasana_tadaima-ramen.jpeg') }}" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#0f0f0f]/60 to-[#0f0f0f]"></div>
        </div>
        
        <div class="relative z-10 text-center px-6">
            <span class="text-red-600 font-bold tracking-[0.3em] uppercase text-sm mb-4 block underline underline-offset-8 decoration-white/20">Est. 2024</span>
            <h1 class="text-6xl md:text-8xl font-black italic uppercase leading-none">
                Tadaima <br> <span class="text-red-600">Ramen</span>
            </h1>
            <p class="mt-8 text-gray-400 text-lg md:text-xl max-w-2xl mx-auto italic font-light">
                "Sebuah pelukan hangat dalam bentuk semangkuk ramen."
            </p>
        </div>
    </section>

    <section class="py-24 px-6 border-b border-zinc-900">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-4xl font-black uppercase mb-8 border-l-4 border-red-600 pl-6 italic leading-tight">
                        The Meaning of <br> <span class="text-red-600">"Tadaima"</span>
                    </h2>
                    <div class="space-y-6 text-gray-400 leading-relaxed text-lg">
                        <p>
                            Dalam tradisi Jepang, <span class="text-white italic">"Tadaima"</span> adalah kata pertama yang diucapkan saat seseorang melangkah masuk ke rumah setelah hari yang panjang. Artinya sederhana: <span class="text-white font-bold">"Saya pulang."</span>
                        </p>
                        <p>
                            Tadaima Ramen lahir dari filosofi tersebut. Kami percaya bahwa ramen bukan sekadar makanan cepat saji, melainkan <span class="text-red-600">ritual kehangatan</span>. Kami ingin setiap pengunjung merasakan kenyamanan yang sama seperti saat mereka pulang ke rumah yang penuh cinta.
                        </p>
                        <p>
                            Kesibukan dunia luar seringkali melelahkan. Di sini, kami mengundang Anda untuk melepas penat, menyeruput kuah kaldu yang kaya, dan merasakan bahwa Anda telah <span class="text-white underline decoration-red-600">kembali ke tempat di mana Anda diterima apa adanya</span>.
                        </p>
                    </div>
                </div>
                <div class="relative group order-1 md:order-2">
                    <div class="absolute -inset-4 border-2 border-red-600/30 rounded-2xl group-hover:border-red-600 transition-colors duration-500"></div>
                    <img src="{{ asset('images/gallery/1780408980_bagian_depan_tadaima_ramen.jpeg') }}" class="rounded-xl relative z-10 transition-all duration-700 shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6 bg-zinc-950/30">
        <div class="max-w-4xl mx-auto text-center">
            <h3 class="text-red-600 font-bold uppercase tracking-widest text-sm mb-4">Dedikasi & Kualitas</h3>
            <h2 class="text-4xl font-black uppercase mb-10 italic">Dibuat Dengan <span class="text-red-600">Presisi</span></h2>
            <p class="text-gray-400 text-lg leading-relaxed mb-12 italic">
                "Kami tidak percaya pada jalan pintas. Rasa yang jujur membutuhkan waktu, kesabaran, dan bahan-bahan terbaik yang bisa diberikan oleh alam."
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-[#0f0f0f] border border-zinc-800 rounded-2xl hover:border-red-600 transition-colors group">
                    <div class="text-4xl mb-6 text-red-600 group-hover:scale-110 transition-transform">🍜</div>
                    <h4 class="text-lg font-bold uppercase mb-4 tracking-widest text-white">Artisan Noodles</h4>
                    <p class="text-gray-500 text-sm">Mie yang dibuat segar setiap pagi dengan teknik tradisional untuk tekstur kenyal yang sempurna.</p>
                </div>
                <div class="p-8 bg-[#0f0f0f] border border-zinc-800 rounded-2xl hover:border-red-600 transition-colors group">
                    <div class="text-4xl mb-6 text-red-600 group-hover:scale-110 transition-transform">🔥</div>
                    <h4 class="text-lg font-bold uppercase mb-4 tracking-widest text-white">Umami Broth</h4>
                    <p class="text-gray-500 text-sm">Kaldu yang dimasak perlahan selama 12 jam untuk mengekstraksi setiap tetes kemurnian rasa.</p>
                </div>
                <div class="p-8 bg-[#0f0f0f] border border-zinc-800 rounded-2xl hover:border-red-600 transition-colors group">
                    <div class="text-4xl mb-6 text-red-600 group-hover:scale-110 transition-transform">🌿</div>
                    <h4 class="text-lg font-bold uppercase mb-4 tracking-widest text-white">Pure Ingredients</h4>
                    <p class="text-gray-500 text-sm">Tanpa MSG berlebih, tanpa pengawet. Hanya bahan segar dari petani lokal yang kami percaya.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-black uppercase mb-4 italic">
                Web Ini Dibuat Oleh 
            </h2>
            <p class="text-gray-500 mb-16 text-sm tracking-widest uppercase font-bold">Kelompok 13 PA-1 • Angkatan 2025</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 justify-center">
                <div class="group max-w-[240px] mx-auto">
                    <div class="relative overflow-hidden rounded-full aspect-square mb-6 border-2 border-zinc-800 group-hover:border-red-600 transition-all duration-500 p-2">
                        <img src="{{ asset('images/team/sofranta.jpeg') }}" class="w-full h-full object-cover rounded-full transition-all duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></div>
                    </div>
                    <h5 class="text-lg font-bold uppercase tracking-widest text-white">Sofranta Pasaribu</h5>
                    <p class="text-red-600 text-[10px] font-black mt-2 uppercase tracking-[0.3em]">Project Leader / Backend</p>
                </div>

                <div class="group max-w-[240px] mx-auto">
                    <div class="relative overflow-hidden rounded-full aspect-square mb-6 border-2 border-zinc-800 group-hover:border-red-600 transition-all duration-500 p-2">
                        <img src="{{ asset('images/team/gabriel.jpeg') }}" class="w-full h-full object-cover rounded-full transition-all duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></div>
                    </div>
                    <h5 class="text-lg font-bold uppercase tracking-widest text-white">Gabriel Pangaribuan</h5>
                    <p class="text-red-600 text-[10px] font-black mt-2 uppercase tracking-[0.3em]">Frontend Developer</p>
                </div>

                <div class="group max-w-[240px] mx-auto">
                    <div class="relative overflow-hidden rounded-full aspect-square mb-6 border-2 border-zinc-800 group-hover:border-red-600 transition-all duration-500 p-2">
                        <img src="{{ asset('images/team/ruth.jpeg') }}" class="w-full h-full object-cover rounded-full transition-all duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-red-600/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></div>
                    </div>
                    <h5 class="text-lg font-bold uppercase tracking-widest text-white">Ruth Panggabean</h5>
                    <p class="text-red-600 text-[10px] font-black mt-2 uppercase tracking-[0.3em]">UI/UX Designer</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-red-600 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/asfalt-dark.png')]"></div>
        <div class="relative z-10">
            <h2 class="text-4xl font-black uppercase italic mb-8">Siap Untuk "Pulang" ke Kehangatan?</h2>
            <a href="{{ route('menu') }}" class="inline-block bg-white text-red-600 font-black px-12 py-4 rounded-full uppercase tracking-widest hover:bg-black hover:text-white transition-all transform hover:scale-110 shadow-2xl">
                Lihat Menu Kami
            </a>
        </div>
    </section>
</div>
@endsection