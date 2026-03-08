<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        \DB::table('menus')->insert([
            [
                'name' => 'Katsu Dry Ramen',
                'price' => 28000,
                'description' => 'Katsu Dry Ramen yang disajikan dengan topping Chiken Katsu, telur mata sapi, dan irisan Nori.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Japanese Kare Ramen',
                'price' => 36000,
                'description' => 'Ramen berkuah kental, kari Jepang kaya rempah, dipadukan dengan mie kenyal, potongan daging Ayam lembut, telur rebus setengah matang, serta Daun Bawang Segar, dengan Nori.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chiken Katsu Kare Rice',
                'price' => 34000,
                'description' => 'Chiken Katsu Kare Rice, ayam yang dimasak menggunakan bumbu kari Jepang, dengan potongan kentang dan wortel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tadaima Fried Rice',
                'price' => 36000,
                'description' => 'Tadaima Fried Rice, Nasi Goreng Khas Tadaima, berpadu dengan Chiken Katsu, Nori dan saus Teriyaki Ala Jepang dengan tambahan Andaliman.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fried Banana Choco Rice',
                'price' => 27000,
                'description' => 'Pisang barangan Toba yang digoreng, ditambah keju dan saus coklat ditaburi ceres.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Onigiri',
                'price' => 22000,
                'description' => 'Onigiri, irisan daging ayam dengan mayonise dan Nori.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
