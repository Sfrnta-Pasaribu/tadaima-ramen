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
        // Mengambil SEMUA data menu dari tabel menu
        $menus = Menu::all(); 
        return view('menu', compact('menus'));
    }
}