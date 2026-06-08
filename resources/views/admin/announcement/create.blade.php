<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pasang Pengumuman / Promo Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                @endif

                <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Judul Pengumuman</label>
                        <input type="text" name="title" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tipe Pengumuman</label>
                        <select name="type" id="typeSelect" class="w-full border-gray-300 rounded-md shadow-sm" onchange="toggleImageInput()">
                            <option value="promo">Promosi (Muncul di Beranda dengan Gambar)</option>
                            <option value="pengumuman">Informasi/Jadwal Tutup (Muncul di Bar Atas)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Isi Pesan</label>
                        <textarea name="content" rows="4" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    </div>

                    <div class="mb-6" id="imageContainer">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Promo</label>
                        <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700">
                    </div>

                    <div class="flex items-center justify-between border-t pt-6">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">← Batal</a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-lg transition">Posting Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleImageInput() {
            const select = document.getElementById('typeSelect');
            const container = document.getElementById('imageContainer');
            
            // Jika memilih 'pengumuman', sembunyikan input gambar
            if (select.value === 'pengumuman') {
                container.style.display = 'none';
            } else {
                container.style.display = 'block';
            }
        }
        // Panggil saat halaman pertama dimuat
        toggleImageInput();
    </script>
</x-app-layout>