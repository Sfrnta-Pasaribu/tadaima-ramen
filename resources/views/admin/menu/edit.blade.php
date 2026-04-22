@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Menu: {{ $menu->name }}</h2>

            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Ramen</label>
                    <input type="text" name="name" value="{{ $menu->name }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                    <select name="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500">
                        <option value="Ramen" {{ $menu->category == 'Ramen' ? 'selected' : '' }}>Ramen</option>
                        <option value="Side Dish" {{ $menu->category == 'Side Dish' ? 'selected' : '' }}>Side Dish</option>
                        <option value="Drink" {{ $menu->category == 'Drink' ? 'selected' : '' }}>Drink</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ $menu->price }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>{{ $menu->description }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Foto Saat Ini</label>
                    <img src="{{ asset($menu->image) }}" class="w-32 h-32 object-cover rounded mb-2 shadow">
                    <label class="block text-gray-500 text-xs italic mt-2">Upload foto baru jika ingin mengganti</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500 mt-2">
                </div>

                <div class="flex items-center justify-end space-x-3">
                    <a href="{{ route('menu.index') }}" class="text-gray-600 hover:underline">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection