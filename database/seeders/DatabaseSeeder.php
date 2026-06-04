<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT ADMIN TERLEBIH DAHULU (Agar mendapat ID 1)
        User::factory()->create([
            'name' => 'Admin Tadaima',
            'username' => 'tadaima_1', 
            'password' => Hash::make('ramen123'),
        ]);

        // 2. SETELAH ADMIN LAHIR, BARU MASUKKAN MENU & GALERI
        $this->call([
            MenuSeeder::class,
            GallerySeeder::class,
        ]);
    }
}