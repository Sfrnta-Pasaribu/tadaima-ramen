@extends('layouts.admin')
@section('title', 'Tambah Promo & Berita')
@section('header_title', 'Tambah Pengumuman')
@section('content')

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
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tipe Pengumuman</label>
                        <select name="type" id="typeSelect" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" onchange="toggleInputs()">
                            <option value="promo">Promosi Biasa (Muncul di Beranda dengan Gambar)</option>
                            <option value="pengumuman">Informasi/Jadwal Tutup (Muncul di Bar Atas)</option>
                            <option value="diskon">Promo Diskon (Otomatis Potong Harga Menu)</option>
                        </select>
                    </div>

                    <div id="diskonContainer" style="display: none;" class="mb-5 bg-red-50 p-5 rounded-lg border border-red-200">
                        <h4 class="font-bold text-red-700 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H14a1 1 0 100-2H8.414l1.293-1.293z" clip-rule="evenodd" /></svg>
                            Pengaturan Potongan Harga
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Terapkan Pada:</label>
                                
                                <div class="w-full border border-gray-300 rounded-lg shadow-sm bg-white overflow-hidden">
                                    <div class="px-3 py-2 border-b border-gray-200 bg-gray-50">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" name="menu_id[]" value="all" id="selectAll" class="rounded text-red-600 focus:ring-red-500 w-4 h-4 border-gray-300">
                                            <span class="ml-2 font-bold text-gray-800 text-sm">✅ SEMUA MENU</span>
                                        </label>
                                    </div>

                                    <div class="p-2 overflow-y-auto" style="max-height: 160px;">
                                        @foreach(\App\Models\Menu::all() as $menu)
                                        <label class="flex items-center px-2 py-1.5 hover:bg-red-50 rounded cursor-pointer transition mb-1">
                                            <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}" class="menu-checkbox rounded text-red-600 focus:ring-red-500 w-4 h-4 border-gray-300">
                                            <span class="ml-2 text-gray-700 text-sm">{{ $menu->name }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                <p class="text-[10px] text-gray-500 mt-1 font-bold">*Scroll ke bawah untuk melihat menu lainnya.</p>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Potongan</label>
                                <select name="discount_type" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                                    <option value="percentage">Persentase (%)</option>
                                    <option value="nominal">Nominal Rupiah (Rp)</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Besaran Angka</label>
                                <input type="number" name="discount_amount" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500" placeholder="20 (jika %), 5000 (jika Rp)">
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-4">*Pilih jenis potongan, lalu masukkan angkanya. Sistem otomatis menghitung dan mencoret harga menu.</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Isi Pesan</label>
                        <textarea name="content" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-6" id="imageContainer">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Promo (Opsional) | Max : 2MB</label>
                        <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer">
                    </div>

                    <div class="flex items-center justify-between border-t pt-6">
                        <a href="{{ route('announcement.index') }}" class="text-gray-600 hover:underline">← Batal</a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-lg transition">Posting Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleInputs() {
            const select = document.getElementById('typeSelect');
            const imageContainer = document.getElementById('imageContainer');
            const diskonContainer = document.getElementById('diskonContainer');
            
            if (select.value === 'pengumuman') {
                imageContainer.style.display = 'none';
                diskonContainer.style.display = 'none';
            } else if (select.value === 'diskon') {
                imageContainer.style.display = 'block'; 
                diskonContainer.style.display = 'block'; 
            } else {
                imageContainer.style.display = 'block';
                diskonContainer.style.display = 'none';
            }
        }
        
        toggleInputs();

        // Logika untuk Checkbox "Pilih Semua"
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('.menu-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });
    </script>
@endsection