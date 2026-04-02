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
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'gallery-1.jpg', 
                'type' => 'ambiance'
            ],
            [
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'gallery-1.jpg', 
                'type' => 'ambiance'
            ],
            [
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'gallery-1.jpg', 
                'type' => 'ambiance'
            ],
            [
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'gallery-1.jpg', 
                'type' => 'ambiance'
            ],
            [
                'title' => 'Suasana Malam Tadaima', 
                'image' => 'gallery-1.jpg', 
                'type' => 'ambiance'
            ],
        ];

        foreach ($photos as $photo) {
            Gallery::create($photo);
        }
    }
}