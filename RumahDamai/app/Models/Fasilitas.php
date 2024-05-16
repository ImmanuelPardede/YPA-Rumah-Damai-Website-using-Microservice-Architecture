<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas'; // Menyatakan nama tabel yang terkait dengan model

    protected $fillable = [
        'fasilitas',
        'img_fasilitas',
    ];

    public function detailFasilitas()
    {
        return $this->hasMany(DetailFasilitas::class);
    }
}
