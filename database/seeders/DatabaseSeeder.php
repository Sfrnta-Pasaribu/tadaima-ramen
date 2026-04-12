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
        // Memanggil MenuSeeder agar data ramen masuk ke database
        $this->call([
            MenuSeeder::class,
            GallerySeeder::class,
        ]);

        // Kode bawaan untuk membuat user (boleh dibiarkan)
        User::factory()->create([
            'name' => 'Admin Tadaima',
            'username' => 'tadaima_1', 
            'password' => Hash::make('ramen123'),
        ]);
    }
}
