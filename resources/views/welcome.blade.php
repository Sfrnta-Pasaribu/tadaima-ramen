<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tadaima Ramen | Daftar Menu Otentik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f0f0f] text-white antialiased font-sans p-6 lg:p-12">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between mb-16 bg-red-600 p-8 rounded-3xl shadow-2xl">
            <div class="text-center md:text-left mb-6 md:mb-0">
                <p class="text-red-200 uppercase tracking-[0.4em] text-xs font-bold mb-2">Kedai Ramen Otentik Pertama Di Toba</p>
                <h1 class="text-6xl font-black italic tracking-tighter text-white uppercase leading-none">TADAIMA<br>RAMEN</h1>
            </div>
            <span class="text-8xl drop-shadow-2xl animate-bounce">🍜</span>
        </div>

        <h2 class="text-3xl font-bold mb-8 border-l-4 border-red-600 pl-4 uppercase tracking-tighter">Menu Favorit Kami</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($menus as $menu)
            <div class="bg-[#1b1b18] border border-red-900/20 p-6 rounded-2xl hover:border-red-600/50 transition-all shadow-lg group">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-red-500 group-hover:text-red-400 transition-colors">{{ $menu->name }}</h3>
                    <span class="bg-red-600/10 text-red-500 text-sm font-bold px-3 py-1 rounded-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4 italic">{{ $menu->description }}</p>
                <button class="w-full py-2 bg-[#2a2a26] hover:bg-red-600 text-xs font-bold uppercase tracking-widest rounded-xl transition-all">Pesan Sekarang</button>
            </div>
            @endforeach
        </div>

        <footer class="mt-20 text-center text-gray-600 text-sm border-t border-gray-800 pt-8">
            &copy; 2026 Tadaima Ramen Toba. Semua Hak Dilindungi.
        </footer>
    </div>
</body>
</html>