@extends('layouts.admin')

@section('title', 'Dasbor - Tadaima Ramen')
@section('header_title', 'Ringkasan Dasbor')

@section('content')

    @if(session('success'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-r-lg shadow-sm" role="alert">
            <p class="font-bold">Berhasil!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }} 🍜</h2>
        <p class="text-sm text-gray-500">Kelola data Tadaima Ramen kamu melalui panel kontrol di bawah ini.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Menu</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Menu::count() }} Varian</h3>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Promo & Info</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Announcement::count() ?? 0 }} Aktif</h3>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Galeri Foto</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Gallery::count() ?? 0 }} Foto</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('menu.create') }}" class="bg-red-50 text-red-700 text-center py-3 rounded-lg font-bold border border-red-100 hover:bg-red-600 hover:text-white transition">+ Tambah Menu</a>
            <a href="{{ route('announcement.create') }}" class="bg-blue-50 text-blue-700 text-center py-3 rounded-lg font-bold border border-blue-100 hover:bg-blue-600 hover:text-white transition">+ Tambah Promo</a>
            <a href="{{ route('gallery.create') }}" class="bg-purple-50 text-purple-700 text-center py-3 rounded-lg font-bold border border-purple-100 hover:bg-purple-600 hover:text-white transition">+ Tambah Foto</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
            <div class="p-6 border-b border-gray-100 bg-slate-50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Daftar Admin Aktif</h3>
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                    {{ \App\Models\User::count() }} Akun
                </span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white border-b text-gray-500 text-xs uppercase tracking-wider">
                            <th class="py-3 px-6 font-semibold">Nama Admin</th>
                            <th class="py-3 px-6 font-semibold">Username</th>
                            <th class="py-3 px-6 font-semibold text-right">Ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach(\App\Models\User::orderBy('created_at', 'desc')->get() as $admin)
                        <tr class="border-b hover:bg-slate-50 transition">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center font-bold text-xs">
                                        {{ substr($admin->name, 0, 1) }}
                                    </div>
                                    <span class="font-bold text-gray-800">{{ $admin->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-600">{{ $admin->username }}</td>
                            <td class="py-4 px-6 text-gray-500 text-right">
                                {{ $admin->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 h-fit">
            <div class="p-6 border-b border-gray-100 bg-slate-50">
                <h3 class="text-lg font-bold text-gray-800">Tambah Admin Baru</h3>
                <p class="text-gray-500 text-xs mt-1">Berikan akses kontrol panel kepada rekan tim tepercaya.</p>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('admin.store') }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-slate-50 border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500 transition-all">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" required class="w-full bg-slate-50 border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500 transition-all">
                            @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Password</label>
                            <input type="password" name="password" required class="w-full bg-slate-50 border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500 transition-all">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Ulangi Password</label>
                            <input type="password" name="password_confirmation" required class="w-full bg-slate-50 border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500 transition-all">
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-50 flex justify-end">
                        <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-6 py-2.5 rounded-lg transition-all shadow-sm text-sm">
                            + Daftarkan Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection