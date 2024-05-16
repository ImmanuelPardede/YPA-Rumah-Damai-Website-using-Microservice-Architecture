<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFasilitas extends Model
{
    use HasFactory;
    protected $table = 'detail_fasilitas'; // Menyatakan nama tabel yang terkait

    protected $fillable = [
        'fasilitas_id',
        'img_fasilitas',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }

}
