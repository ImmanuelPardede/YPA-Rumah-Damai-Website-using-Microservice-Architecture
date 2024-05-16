<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiTugas extends Model
{
    use HasFactory;

    protected $table = 'lokasi_penugasan';
    protected $fillable = ['id', 'wilayah', 'lokasi', 'deskripsi'];

    public function anak(){
        return $this->hasMany(Anak::class);
    }
}
