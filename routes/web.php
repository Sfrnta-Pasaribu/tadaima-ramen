<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// 1. Halaman Beranda (Home)
Route::get('/', [HomeController::class, 'index']);

// 2. Halaman Daftar Menu (Harus lewat Controller agar datanya muncul)
Route::get('/menu', [HomeController::class, 'menu']);

// 3. Halaman Statis (Tentang Kami, Blog, Gallery)
// Pakai Route::view kalau cuma nampilin tampilan simpel tanpa data database
Route::view('/about', 'about');
Route::view('/blog', 'blog');
Route::view('/gallery', 'gallery');