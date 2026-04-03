<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery; 

class GallerySeeder extends Seeder 
{
    public function run()
    {
        $photos = [
            [
                'title' => 'Bagian Depan Tadaima Ramen', 
                'image' => 'bagian_depan_tadaima_ramen.jpeg', 
                'type' => 'ambiance'
            ],
            [
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'suasana_tadaima-ramen.jpeg', 
                'type' => 'ambiance'
            ],
            [
                'title' => 'Pelanggan Setia', 
                'image' => 'pelanggan1.jpeg', 
                'type' => 'customer'
            ],
            [
                'title' => 'Pelanggan Setia', 
                'image' => 'pelanggan2.jpeg', 
                'type' => 'customer'
            ],
            [
                'title' => 'Pelanggan Setia', 
                'image' => 'pelanggan3.jpeg', 
                'type' => 'customer'
            ],
            [
                'title' => 'Pelanggan Setia', 
                'image' => 'pelanggan4.jpeg', 
                'type' => 'customer'
            ],
        ];

        foreach ($photos as $photo) {
            Gallery::create($photo);
        }
    }
}