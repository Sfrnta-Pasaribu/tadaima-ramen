<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Beritahu Laravel kolom mana saja yang boleh diisi (Mass Assignment)
    protected $fillable = ['name', 'description', 'price', 'image'];
}