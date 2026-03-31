<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class HomeController extends Controller
{
    public function index()
    {
        $signatureMenus = Menu::take(3)->get();
        return view('home', compact('signatureMenus'));
    }
    public function menu()
    {
        // Tentukan urutan kategori yang kamu inginkan
        $priority = ['Ramen', 'Dry Ramen', 'Rice', 'Fried Rice', 'Drinks', 'Snacks', 'Dessert'];

        $groupedMenus = Menu::all()
            ->groupBy('category')
            ->sortBy(function ($items, $key) use ($priority) {
                // Mencari posisi kategori di dalam array priority
                return array_search($key, $priority);
            });

        return view('menu', compact('groupedMenus'));
    }
}