<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Selamat Datang 🍜</h3>
                    <p class="text-gray-600 mb-8">Kelola data Tadaima Ramen kamu melalui panel kontrol di bawah ini.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-red-50 p-6 rounded-xl border border-red-100 hover:shadow-lg transition">
                            <h4 class="text-red-700 font-bold text-lg mb-2">Manajemen Menu</h4>
                            <p class="text-sm text-gray-600 mb-4">Lihat, tambah, ubah, atau hapus semua menu ramen kamu.</p>
                            <a href="{{ route('menu.index') }}" class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-700">
                                Buka Daftar Menu →
                            </a>
                        </div>

                        <div class="bg-blue-50 p-6 rounded-xl border border-blue-100">
                            <h4 class="text-blue-700 font-bold text-lg mb-2">Total Menu</h4>
                            <p class="text-3xl font-black text-blue-900">{{ \App\Models\Menu::count() }}</p>
                            <p class="text-xs text-blue-600 mt-2">Item terdaftar saat ini</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm text-center">
                            <h4 class="text-gray-800 font-bold text-lg mb-2">Pengumuman & Promo</h4>
                            <p class="text-sm text-gray-500 mb-6">Atur informasi jadwal tutup atau promo terbaru Tadaima Ramen dengan mudah.</p>
                            
                            <div class="flex flex-row justify-center items-center gap-4">
                                <a href="{{ route('announcement.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full text-sm font-bold shadow-md transition">
                                    + Tambah Baru
                                </a>

                                <a href="{{ route('announcement.index') }}" class="bg-white hover:bg-gray-50 text-black border border-white px-6 py-2 rounded-full text-sm font-bold shadow-sm transition">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>