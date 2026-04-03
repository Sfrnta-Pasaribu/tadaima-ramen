@extends('layouts.app')

@section('content')
<div class="pt-32 pb-20 bg-[#0f0f0f] min-h-screen" x-data="{ activeTab: 'all' }">
    <div class="max-w-6xl mx-auto px-6 text-center mb-16">
        <h2 class="text-5xl font-black text-white italic uppercase tracking-tighter">
            Our <span class="text-red-600">Moments</span>
        </h2>
        <div class="w-24 h-1 bg-red-600 mx-auto mt-4"></div>
        <p class="text-gray-400 mt-6 max-w-2xl mx-auto text-lg italic">
            "Menangkap kehangatan di setiap mangkuk dan tawa di setiap sudut Tadaima Ramen."
        </p>
    </div>

    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <button @click="activeTab = 'all'" 
            :class="activeTab === 'all' ? 'bg-red-600 text-white' : 'bg-zinc-800 text-gray-400 hover:bg-zinc-700'"
            class="px-8 py-2 rounded-full font-bold uppercase tracking-widest text-xs transition-all duration-300">
            All
        </button>
        <button @click="activeTab = 'ambiance'" 
            :class="activeTab === 'ambiance' ? 'bg-red-600 text-white' : 'bg-zinc-800 text-gray-400 hover:bg-zinc-700'"
            class="px-8 py-2 rounded-full font-bold uppercase tracking-widest text-xs transition-all duration-300">
            Ambiance
        </button>
        <button @click="activeTab = 'customer'" 
            :class="activeTab === 'customer' ? 'bg-red-600 text-white' : 'bg-zinc-800 text-gray-400 hover:bg-zinc-700'"
            class="px-8 py-2 rounded-full font-bold uppercase tracking-widest text-xs transition-all duration-300">
            Customers
        </button>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleries as $item)
            <div x-show="activeTab === 'all' || activeTab === '{{ $item->type }}'"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="relative group cursor-pointer overflow-hidden rounded-xl bg-zinc-900 aspect-[4/5]">
                
                <img src="{{ asset('images/gallery/' . $item->image) }}" 
                     alt="{{ $item->title }}"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:rotate-2">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                    <span class="text-red-500 text-xs font-bold uppercase tracking-[0.2em] mb-2">{{ $item->type }}</span>
                    <h3 class="text-white text-xl font-black uppercase italic leading-none">{{ $item->title }}</h3>
                    <div class="w-0 group-hover:w-12 h-1 bg-red-600 transition-all duration-500 mt-4"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection