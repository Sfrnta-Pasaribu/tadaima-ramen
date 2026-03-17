<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
        public function run(): void
    {
        \DB::table('menus')->insert([
            [
                'name' => 'Japanese Kare Ramen',
                'price' => 36000,
                'description' => 'Ramen berkuah kental, kari Jepang kaya rempah, dipadukan dengan mie kenyal, potongan daging Ayam lembut, telur rebus setengah matang, serta Daun Bawang Segar, dengan Nori.',
                'image' => 'japanese_kare_ramen.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chiken Katsu Kare Rice',
                'price' => 34000,
                'description' => 'Chicken Katsu Kare Rice, ayam yang dimasak menggunakan bumbu kari Jepang, dengan potongan kentang dan wortel.',
                'image' => 'chicken_katsu_kare_rice.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tadaima Fried Rice',
                'price' => 36000,
                'description' => 'Tadaima Fried Rice, Nasi Goreng Khas Tadaima, berpadu dengan Chiken Katsu, Nori dan saus Teriyaki Ala Jepang dengan tambahan Andaliman.',
                'image' => 'tadaima_fried_rice.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seafood Fried Rice',
                'price' => 35000,
                'description' => 'Seafood Fried Rice, disajikan dengan udang, fish cake, telur dan bakso ikan.',
                'image' => 'seafood_fried_rice.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karegayaki Rice',
                'price' => 32000,
                'description' => 'Karegayaki Rice, ayam goreng tepung khas Jepang dengan saus teriyaki, irisan wortel, dan kaldu ayam.',
                'image' => 'karegayaki_rice.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
