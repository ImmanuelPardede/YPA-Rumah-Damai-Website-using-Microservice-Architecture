<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    use HasFactory;

    protected $table = 'carousel_items';

    protected $fillable = [
        'image_url', 'caption', 'subcaption',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];
}
