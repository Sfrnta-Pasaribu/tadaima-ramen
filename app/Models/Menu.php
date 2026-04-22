<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk kolom-kolom di tabel menus kamu
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image'
    ];
}