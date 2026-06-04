<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
    'admin_id',
    'type', 
    'title', 
    'content', 
    'image' 
    ];
}