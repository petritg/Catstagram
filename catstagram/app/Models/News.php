<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'cover_image',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
    ];
} 
