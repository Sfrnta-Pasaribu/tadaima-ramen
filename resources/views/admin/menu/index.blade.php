@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Menu Tadaima Ramen</h2>
            <a href="{{ route('menu.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition">
                + Tambah Menu
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th class="py-3 px-4">Foto</th>
                        <th class="py-3 px-4">Nama Menu</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Harga</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-3 px-4">
                            <img src="{{ asset($menu->image) }}" class="w-20 h-20 object-cover rounded shadow-md">
                        </td>
                        <td class="py-3 px-4 font-bold text-gray-700">{{ $menu->name }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $menu->category }}</td>
                        <td class="py-3 px-4 text-gray-800 font-semibold">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('menu.edit', $menu->id) }}" class="text-blue-600 hover:text-blue-800 font-medium mx-2">Edit</a>
                            
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium mx-2" onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection