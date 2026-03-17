<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class HomeController extends Controller
{
    public function index()
    {
        // Sekarang Laravel sudah kenal siapa itu Menu
        $signatureMenus = Menu::take(3)->get(); 

        return view('home', compact('signatureMenus'));
    }
}