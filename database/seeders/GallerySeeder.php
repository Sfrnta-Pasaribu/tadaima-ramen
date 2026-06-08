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
                'title' => 'Tampak Depan Tadaima Ramen', 
                'image' => 'images/gallery/1780408980_bagian_depan_tadaima_ramen.jpeg', 
                'type' => 'ambiance',
                'admin_id' => 1
            ],
            [
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'images/gallery/1780409376_suasana_tadaima-ramen.jpeg', 
                'type' => 'ambiance',
                'admin_id' => 1
            ],
            [
                'title' => 'Kumpul Seru Bareng Bestie', 
                'image' => 'images/gallery/1780409495_pelanggan1.jpeg', 
                'type' => 'customers',
                'admin_id' => 1
            ],
            [
                'title' => 'Momen Hangat Lintas Generasi', 
                'image' => 'images/gallery/1780409522_pelanggan2.jpeg', 
                'type' => 'customers',
                'admin_id' => 1
            ],
            [
                'title' => 'Kompak Seru: Itadakimasu!', 
                'image' => 'images/gallery/1780409569_pelanggan3.jpeg', 
                'type' => 'customers',
                'admin_id' => 1
            ],
            [
                'title' => 'Cerita Manis di Sudut jendela', 
                'image' => 'images/gallery/1780409676_pelanggan4.jpeg', 
                'type' => 'customers',
                'admin_id' => 1
            ],
        ];

        foreach ($photos as $photo) {
            Gallery::create($photo);
        }
    }
}