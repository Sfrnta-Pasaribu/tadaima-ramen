@extends('layouts.admin')
@section('title', 'Kelola Menu')
@section('header_title', 'Manajemen Foto galeri')
@section('content')

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Notifikasi Berhasil -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-r-lg shadow-sm" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Foto Galeri</h2>
                <a href="{{ route('gallery.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow-sm text-sm">
                    + Tambah Foto
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-6 text-gray-900">
                    
                    @if($galleries->isEmpty())
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">Belum ada foto yang diunggah ke galeri.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-500 bg-gray-50">
                                        <th class="py-4 px-6 w-16">No</th>
                                        <th class="py-4 px-6 w-32">Preview</th>
                                        <th class="py-4 px-6">Judul Foto</th>
                                        <th class="py-4 px-6 w-44">Kategori</th>
                                        <th class="py-4 px-6 w-32 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    @foreach($galleries as $index => $gallery)
                                        <tr class="hover:bg-gray-50/80 transition-colors">
                                            <td class="py-4 px-6 font-medium text-gray-600">{{ $index + 1 }}</td>
                                            <td class="py-4 px-6">
                                                <!-- Preview Gambar Mini -->
                                                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="w-20 h-14 object-cover rounded-lg border border-gray-100 shadow-sm">
                                            </td>
                                            <td class="py-4 px-6 font-semibold text-gray-800">{{ $gallery->title }}</td>
                                            <td class="py-4 px-6">
                                                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $gallery->type === 'ambiance' ? 'bg-amber-50 text-amber-700 border border-amber-100' : 'bg-purple-50 text-purple-700 border border-purple-100' }}">
                                                    {{ $gallery->type }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-6 text-center">
                                                <!-- Form Hapus Data -->
                                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus foto ini?')" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs uppercase tracking-wider transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-700 font-medium transition">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>

@endsection