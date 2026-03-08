<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    // Mengambil semua data menu dari database
    $menus = DB::table('menus')->get();

    // Mengirim data $menus ke halaman welcome
    return view('welcome', ['menus' => $menus]);
});