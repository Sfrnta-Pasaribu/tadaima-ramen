@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
<div class="pt-32 pb-20 bg-zinc-950 min-h-screen">
    <div class="container mx-auto px-6 text-center mb-16">
        <h2 class="text-5xl font-black text-white italic uppercase">Our <span class="text-red-600">Gallery</span></h2>
        <p class="text-gray-400 mt-4">Momen kehangatan dan kelezatan di setiap sudut Tadaima Ramen.</p>
    </div>

    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($galleries as $item)
        <div class="relative group overflow-hidden rounded-2xl aspect-square">
            <img src="{{ asset('images/gallery/' . $item->image) }}" 
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            
            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-6">
                <p class="text-white font-bold text-lg text-center uppercase tracking-widest">{{ $item->title }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection