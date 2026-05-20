<x-app-layout>
    <div class="pt-32 pb-24 bg-zinc-950 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 text-center">
            
            <h2 class="text-4xl md:text-5xl font-black text-white italic tracking-wide mb-4">Fasilitas <span class="text-red-600">Kami</span></h2>
            <p class="text-gray-400 text-lg mb-12">Kenyamanan Anda adalah prioritas utama di Tadaima Ramen.</p>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 max-w-6xl mx-auto text-left">
                
                <!-- Kartu 1: WiFi -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-[2rem] overflow-hidden shadow-2xl">
                    <!-- Area Gambar (Dipaksa tinggi 200px agar tidak kempes) -->
                    <div style="height: 200px; width: 100%; background-color: #27272a;">
                        <img src="{{ asset('images/fasilitas/free_wifi.jpg') }}" alt="Free WiFi" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'">
                    </div>
                    
                    <div class="p-8 relative pt-6">
                        <!-- Ikon Melayang (Dipaksa posisinya dengan Inline CSS) -->
                        <div style="position: absolute; top: -35px; right: 30px; width: 70px; height: 70px; background-color: #27272a; border: 6px solid #18181b; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 30px; z-index: 10; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);">
                            📶
                        </div>
                        <h3 class="font-bold text-2xl text-white mb-3 mt-2">Free WiFi</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Tetap terhubung sambil menikmati ramen favorit Anda dengan koneksi internet cepat yang tersedia di seluruh area resto.</p>
                    </div>
                </div>

                <!-- Kartu 2: Parkir -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-[2rem] overflow-hidden shadow-2xl">
                    <div style="height: 200px; width: 100%; background-color: #27272a;">
                        <img src="{{ asset('images/fasilitas/parkiran.jpeg') }}" alt="Area Parkir" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'">
                    </div>
                    
                    <div class="p-8 relative pt-6">
                        <div style="position: absolute; top: -35px; right: 30px; width: 70px; height: 70px; background-color: #27272a; border: 6px solid #18181b; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 30px; z-index: 10; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);">
                            🅿️
                        </div>
                        <h3 class="font-bold text-2xl text-white mb-3 mt-2">Area Parkir</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Tersedia area parkir untuk kendaraan roda dua maupun roda empat tepat di bagian depan dan samping resto.</p>
                    </div>
                </div>

                <!-- Kartu 3: Kapasitas Meja -->
                <div class="bg-zinc-900 border border-zinc-800 rounded-[2rem] overflow-hidden shadow-2xl">
                    <div style="height: 200px; width: 100%; background-color: #27272a;">
                        <img src="{{ asset('images/fasilitas/suasana_tadaima-ramen.jpeg') }}" alt="Kapasitas Meja" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'">
                    </div>
                    
                    <div class="p-8 relative pt-6">
                        <div style="position: absolute; top: -35px; right: 30px; width: 70px; height: 70px; background-color: #27272a; border: 6px solid #18181b; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 30px; z-index: 10; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);">
                            🪑
                        </div>
                        <h3 class="font-bold text-2xl text-white mb-6 mt-2">Kapasitas Meja</h3>
                        
                        <div class="space-y-4">
                            <!-- 6P -->
                            <div class="flex items-center gap-4 bg-zinc-950 p-4 rounded-2xl border border-zinc-800/50">
                                <div class="flex-1">
                                    <p class="font-bold text-white text-sm">Meja Tipe 6</p>
                                    <p class="text-[11px] text-gray-500 italic mt-0.5">(6 Kursi) Makan bersama grup besar.</p>
                                    <p class="text-red-500 text-xs font-bold mt-2 flex items-center gap-1">
                                        <span>●</span> Tersedia 2 Meja
                                    </p>
                                </div>
                            </div>

                            <!-- 4P -->
                            <div class="flex items-center gap-4 bg-zinc-950 p-4 rounded-2xl border border-zinc-800/50">
                                <div class="flex-1">
                                    <p class="font-bold text-white text-sm">Meja Tipe 4</p>
                                    <p class="text-[11px] text-gray-500 italic mt-0.5">(4 Kursi) Teman atau keluarga kecil.</p>
                                    <p class="text-red-500 text-xs font-bold mt-2 flex items-center gap-1">
                                        <span>●</span> Tersedia 5 Meja
                                    </p>
                                </div>
                            </div>

                            <!-- 2P -->
                            <div class="flex items-center gap-4 bg-zinc-950 p-4 rounded-2xl border border-zinc-800/50">
                                <div class="flex-1">
                                    <p class="font-bold text-white text-sm">Meja Tipe 2</p>
                                    <p class="text-[11px] text-gray-500 italic mt-0.5">(2 Kursi) Pasangan atau personal.</p>
                                    <p class="text-red-500 text-xs font-bold mt-2 flex items-center gap-1">
                                        <span>●</span> Tersedia 1 Meja
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>