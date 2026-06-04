<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-32 pb-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-r-lg shadow-sm" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm rounded-xl mb-8 border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Selamat Datang, {{ Auth::user()->name }} 🍜</h3>
                    <p class="text-gray-600 mb-8">Kelola data Tadaima Ramen kamu melalui panel kontrol di bawah ini.</p>

                    <!-- 👇 Grid diubah menjadi 2 kolom agar 4 kartu tampil simetris (2x2) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- 1. Manajemen Menu -->
                        <div class="bg-red-50 p-6 rounded-xl border border-red-100 hover:shadow-lg transition">
                            <h4 class="text-red-700 font-bold text-lg mb-2">Manajemen Menu</h4>
                            <p class="text-sm text-gray-600 mb-4">Lihat, tambah, ubah, atau hapus semua menu ramen kamu.</p>
                            <a href="{{ route('menu.index') }}" class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-700">
                                Buka Daftar Menu →
                            </a>
                        </div>

                        <!-- 2. Total Menu -->
                        <div class="bg-blue-50 p-6 rounded-xl border border-blue-100">
                            <h4 class="text-blue-700 font-bold text-lg mb-2">Total Menu</h4>
                            <p class="text-3xl font-black text-blue-900">{{ \App\Models\Menu::count() }}</p>
                            <p class="text-xs text-blue-600 mt-2">Item terdaftar saat ini</p>
                        </div>

                        <!-- 3. Pengumuman & Promo -->
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm text-center">
                            <h4 class="text-gray-800 font-bold text-lg mb-2">Pengumuman & Promo</h4>
                            <p class="text-sm text-gray-500 mb-6">Atur informasi jadwal tutup atau promo terbaru Tadaima Ramen dengan mudah.</p>
                            
                            <div class="flex flex-row justify-center items-center gap-4">
                                <a href="{{ route('announcement.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full text-sm font-bold shadow-md transition">
                                    + Tambah Baru
                                </a>
                                <a href="{{ route('announcement.index') }}" class="bg-white hover:bg-gray-50 text-black border border-gray-200 px-6 py-2 rounded-full text-sm font-bold shadow-sm transition">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>

                        <!-- 4. Manajemen Galeri (BARU) -->
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm text-center hover:shadow-md transition">
                            <h4 class="text-gray-800 font-bold text-lg mb-2">Manajemen Galeri</h4>
                            <p class="text-sm text-gray-500 mb-6">Kelola foto-foto suasana kedai (ambiance) dan momen seru pelanggan.</p>
                            
                            <div class="flex flex-row justify-center items-center gap-4">
                                <a href="{{ route('gallery.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full text-sm font-bold shadow-md transition">
                                    + Tambah Foto
                                </a>
                                <a href="{{ route('gallery.index') }}" class="bg-white hover:bg-gray-50 text-black border border-gray-200 px-6 py-2 rounded-full text-sm font-bold shadow-sm transition">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>

                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-gray-100 flex justify-end">
                        <a href="{{ route('profile.edit') }}" class="text-sm font-bold text-gray-500 hover:text-red-600 transition">
                            Kelola Akun →
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-zinc-900 rounded-lg flex items-center justify-center text-white text-xl shadow-sm">
                            👤
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-zinc-900 uppercase tracking-wider">Tambah Admin Baru</h3>
                            <p class="text-gray-500 text-sm mt-1">Berikan akses kontrol panel kepada rekan tim tepercaya.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-zinc-700">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-zinc-50 border-zinc-200 rounded-lg px-4 py-2.5 focus:ring-red-500 focus:border-red-500 transition-all">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-zinc-700">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" required class="w-full bg-zinc-50 border-zinc-200 rounded-lg px-4 py-2.5 focus:ring-red-500 focus:border-red-500 transition-all">
                            @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-zinc-700">Password</label>
                            <input type="password" name="password" required class="w-full bg-zinc-50 border-zinc-200 rounded-lg px-4 py-2.5 focus:ring-red-500 focus:border-red-500 transition-all">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-zinc-700">Ulangi Password</label>
                            <input type="password" name="password_confirmation" required class="w-full bg-zinc-50 border-zinc-200 rounded-lg px-4 py-2.5 focus:ring-red-500 focus:border-red-500 transition-all">
                        </div>

                        <div class="md:col-span-2 flex justify-center pt-8">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-12 py-3.5 rounded-lg transition-all shadow-md text-sm uppercase tracking-widest">
                                Daftarkan Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>