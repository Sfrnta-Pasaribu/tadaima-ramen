<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Jalur untuk Halaman Beranda (home.blade.php)
Route::get('/', function () {
    return view('home'); 
});

// Jalur untuk Halaman Daftar Menu (menu.blade.php)
Route::get('/menu', function () {
    // Mengambil data ramen dari database untuk ditampilkan di halaman menu
    $menus = DB::table('menus')->get();
    return view('menu', ['menus' => $menus]);
});