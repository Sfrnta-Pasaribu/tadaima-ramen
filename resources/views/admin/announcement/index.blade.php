<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Pengumuman & Promo') }}
            </h2>
            <a href="{{ route('announcement.create') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg text-sm">
                + Tambah Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="py-3 px-4">Tipe</th>
                            <th class="py-3 px-4">Judul</th>
                            <th class="py-3 px-4">Isi Pesan</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($announcements as $item)
                        <tr class="border-b">
                            <td class="py-3 px-4">
                                <span class="{{ $item->type == 'promo' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} px-2 py-1 rounded text-xs font-bold uppercase">
                                    {{ $item->type }}
                                </span>
                            </td>
                            <td class="py-3 px-4 font-bold">{{ $item->title }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ Str::limit($item->content, 50) }}</td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('announcement.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>