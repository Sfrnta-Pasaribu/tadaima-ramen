@extends('layouts.app')

@section('title', 'Galeri Foto')

@section('content')
<div class="py-32 text-center">
    <h1 class="text-4xl font-black">GALLERY</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10 px-6">
        <div class="h-40 bg-zinc-200 rounded-2xl animate-pulse"></div>
        <div class="h-40 bg-zinc-200 rounded-2xl animate-pulse"></div>
        <div class="h-40 bg-zinc-200 rounded-2xl animate-pulse"></div>
        <div class="h-40 bg-zinc-200 rounded-2xl animate-pulse"></div>
    </div>
</div>
@endsection