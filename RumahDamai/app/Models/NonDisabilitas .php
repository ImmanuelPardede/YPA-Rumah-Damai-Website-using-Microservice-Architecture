<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonDisabilitas extends Model
{
    use HasFactory;

    protected $table = 'non_disabilitas';
    protected $fillable = ['kategori_non_disabilitas', 'jenis_non_disabilitas','deskripsi'];
}
