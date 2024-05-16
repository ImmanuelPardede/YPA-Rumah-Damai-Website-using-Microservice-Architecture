<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'latar_belakang',
        'img_yayasan',
        'visi',
        'misi',
        'wilayah1',
        'wilayah2',
        'img_wilayah1',
        'img_wilayah2',
    ];

}
