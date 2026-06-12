@extends('layouts.admin')
@section('title', 'Kelola Menu')
@section('header_title', 'Tambah Galeri')
@section('content')

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-8">
                    
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b border-gray-100 pb-4">
                        Tambah Foto Galeri
                    </h2>

                    <!-- Form upload -->
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Input Judul Foto -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Judul Foto</label>
                            <input type="text" name="title" required
                                class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-red-500 focus:border-red-500 transition-all p-2.5"
                                placeholder="Contoh: Suasana Malam Minggu">
                        </div>

                        <!-- Input Kategori -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                            <select name="type" required
                                class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-red-500 focus:border-red-500 transition-all p-2.5">
                                <option value="ambiance">Ambiance (Suasana Kedai)</option>
                                <option value="customers">Customers (Pelanggan)</option>
                            </select>
                        </div>

                        <!-- Input File Gambar -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">File Gambar | Maximum 2MB</label>
                            <input type="file" name="image" required accept="image/*"
                                class="w-full text-gray-500 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-all">
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-100">
                            <a href="{{ route('gallery.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition font-medium">
                                ← Batal
                            </a>
                            <button type="submit" class="bg-[#d62828] hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-lg transition-all shadow-sm">
                                Unggah Foto
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection