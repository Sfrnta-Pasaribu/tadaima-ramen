<nav class="absolute top-0 left-0 w-full z-50 bg-gradient-to-b from-black/80 to-transparent" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-6 flex justify-between items-center">
        <div class="text-white text-2xl font-black italic tracking-tighter">
            TADAIMA-RAMEN<span class="text-red-500">.</span>
        </div>
        
        <div class="hidden md:flex space-x-8 text-sm font-bold text-white/90 uppercase tracking-widest">
            <a href="/" class="hover:text-red-500 transition text-white">Home</a>
            <a href="/menu" class="hover:text-red-500 transition text-white">Menu</a>
            <a href="/about" class="hover:text-red-500 transition text-white">About</a>
            <a href="/blog" class="hover:text-red-500 transition text-white">Blog</a>
            <a href="/gallery" class="hover:text-red-500 transition text-white">Gallery</a>
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

    <div x-show="open" x-transition class="md:hidden bg-black/95 absolute top-full left-0 w-full p-6 space-y-4 text-center border-t border-white/10">
        <a href="/" class="block text-white font-bold hover:text-red-500">Home</a>
        <a href="/menu" class="block text-white font-bold hover:text-red-500">Menu</a>
        <a href="/about" class="block text-white font-bold hover:text-red-500">About Us</a>
        <a href="/blog" class="block text-white font-bold hover:text-red-500">Blog</a>
        <a href="/gallery" class="block text-white font-bold hover:text-red-500">Gallery</a>
    </div>
</nav>