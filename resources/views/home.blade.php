<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tadaima Ramen | Otentik & Lezat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-zinc-50">

    <nav class="absolute top-0 left-0 w-full z-50 bg-gradient-to-b from-black/80 to-transparent" x-data="{ open: false }">
        <div class="container mx-auto px-6 py-6 flex justify-between items-center">
            <div class="text-white text-2xl font-black italic tracking-tighter">
                TADAIMA-RAMEN<span class="text-red-500">.</span>
            </div>
            
            <div class="hidden md:flex space-x-8 text-sm font-bold text-white/90 uppercase tracking-widest">
                <a href="/" class="hover:text-red-500 transition">Home</a>
                <a href="/menu" class="hover:text-red-500 transition">Menu</a>
                <a href="#about" class="hover:text-red-500 transition">About</a>
                <a href="#blog" class="hover:text-red-500 transition">Blog</a>
                <a href="#gallery" class="hover:text-red-500 transition">Gallery</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="#location" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full text-[10px] md:text-xs font-bold uppercase transition">
                    Lokasi
                </a>
                
                <button @click="open = !open" class="md:hidden text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" 
            x-transition 
            class="md:hidden bg-black/95 absolute top-full left-0 w-full p-6 space-y-4 text-center border-t border-white/10">
            <a href="/" class="block text-white font-bold hover:text-red-500">Home</a>
            <a href="/menu" class="block text-white font-bold hover:text-red-500">Menu</a>
            <a href="#about" class="block text-white font-bold hover:text-red-500">About Us</a>
            <a href="#blog" class="block text-white font-bold hover:text-red-500">Blog</a>
            <a href="#gallery" class="block text-white font-bold hover:text-red-500">Gallery</a>
        </div>
    </nav>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

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
                <a href="#about" class="border border-white/30 text-white px-10 py-4 rounded-full font-bold hover:bg-white/10 transition-all">PELAJARI LEBIH LANJUT</a>
            </div>
        </div>
    </section>

    <section class="py-24">
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
                        <a href="https://www.instagram.com/tadaimaramen?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="w-10 h-10 rounded-full bg-zinc-800 flex items-center justify-center hover:bg-red-600 transition">
                            <span class="text-xs">IG</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Navigasi</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="/menu" class="hover:text-white transition">Daftar Menu</a></li>
                        <li><a href="#blog" class="hover:text-white transition">Artikel & Blog</a></li>
                        <li><a href="#gallery" class="hover:text-white transition">Galeri Foto</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Bantuan</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li><a href="#location" class="hover:text-white transition">Lokasi Kedai</a></li>
                        <li><a href="#" class="hover:text-white transition">Cara Pemesanan</a></li>
                        <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
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

</body>
</html>