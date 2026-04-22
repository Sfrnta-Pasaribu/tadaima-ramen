<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AnnouncementController;

// --- 1. Route Publik (Bisa diakses pengunjung tanpa login) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
// Cukup satu ini saja untuk Fasilitas agar bisa dilihat pelanggan
Route::get('/facilities', [HomeController::class, 'facilities'])->name('facilities.index');

// --- 2. Route Khusus Admin (Harus Login) ---
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Manajemen Menu & Pengumuman
    // URL: tadaima-ramen.test/admin/menu
    Route::resource('admin/menu', MenuController::class);
    Route::resource('announcement', AnnouncementController::class);
});

require __DIR__.'/auth.php';