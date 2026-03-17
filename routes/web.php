<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;

// Arahkan halaman utama ke HomeController
Route::get('/', [HomeController::class, 'index']); 

// Jalur untuk Halaman Daftar Menu (menu.blade.php)
Route::get('/menu', function () {
    // Mengambil data ramen dari database untuk ditampilkan di halaman menu
    $menus = DB::table('menus')->get();
    return view('menu', ['menus' => $menus]);
});