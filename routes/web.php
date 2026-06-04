<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\GalleryController;

// --- 1. Route Publik (Bisa diakses pengunjung tanpa login) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
// 👇 BARU: Menambahkan rute fasilitas di jalur publik
Route::get('/fasilitas', [HomeController::class, 'fasilitas'])->name('fasilitas'); 

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

    // CRUD Manajemen Menu, Pengumuman, & Galeri
    Route::resource('admin/menu', MenuController::class);
    Route::resource('announcement', AnnouncementController::class);
    Route::resource('admin/gallery', GalleryController::class);

    // Route untuk memproses form pendaftaran admin
    Route::post('/admin/tambah', [AdminController::class, 'store'])->name('admin.store');
});

require __DIR__.'/auth.php';