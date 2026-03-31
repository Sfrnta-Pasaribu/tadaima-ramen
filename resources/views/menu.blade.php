@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')
    <div class="pt-32 pb-20 bg-[#0f0f0f] min-h-screen">
        <div class="max-w-6xl mx-auto p-6 lg:p-12">
            
            @foreach($groupedMenus as $category => $items)
                <div class="mb-10 mt-16 first:mt-0 border-l-4 border-red-600 pl-6">
                    <h2 class="text-3xl font-black uppercase tracking-widest text-white">
                        {{ $category }} <span class="text-red-600">Selection</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($items as $menu)
                    <div class="bg-[#1b1b18] border border-white/5 rounded-3xl overflow-hidden shadow-xl group">
                        <div class="relative h-56 w-full overflow-hidden">
                            <div class="absolute top-4 right-4 z-10 bg-red-600 text-white font-bold px-4 py-1 rounded-full shadow-lg text-sm">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </div>
                            <img src="{{ asset('images/' . $menu->image) }}" class="h-full w-full object-cover transition-transform group-hover:scale-110">
                        </div>

                        <div class="p-8">
                            <h3 class="text-xl font-bold mb-3 text-white uppercase">{{ $menu->name }}</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">{{ $menu->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
@endsection