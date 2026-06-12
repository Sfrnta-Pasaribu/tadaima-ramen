@extends('layouts.admin')
@section('title', 'Promo & Berita - Tadaima Ramen')
@section('header_title', 'Manajemen Promo & Berita')
@section('content')

    <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
        
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-slate-50">
            <h2 class="text-lg font-bold text-gray-800">Daftar Promo & Berita Aktif</h2>
            <a href="{{ route('announcement.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm text-sm transition-all">
                + Tambah Pengumuman
            </a>
        </div>

        <div class="p-6 overflow-x-auto">
            
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul class="list-disc ml-5"> 
                        @foreach ($errors->all() as $error) 
                            <li class="text-sm font-semibold">{{ $error }}</li> 
                        @endforeach 
                    </ul>
                </div>
            @endif

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b bg-gray-50 text-gray-600 text-sm">
                        <th class="py-3 px-4 font-semibold">Tipe</th>
                        <th class="py-3 px-4 font-semibold">Judul</th>
                        <th class="py-3 px-4 font-semibold">Isi Pesan</th>
                        <th class="py-3 px-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $item)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-3 px-4">
                            <span class="{{ $item->type == 'promo' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }} px-2 py-1 rounded text-xs font-bold uppercase tracking-wide">
                                {{ $item->type }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-bold text-gray-800">{{ $item->title }}</td>
                        <td class="py-3 px-4 text-sm text-gray-600">{{ Str::limit($item->content, 50) }}</td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('announcement.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?');">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center text-gray-500 text-sm italic">
                            Belum ada pengumuman atau promo yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection