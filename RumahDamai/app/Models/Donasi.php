<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi';
    protected $fillable = ['jenis_donasi', 'deskripsi'];

    public function donatur()
    {
        return $this->belongsToMany(Donatur::class, 'donatur_donasi', 'donasi_id', 'donatur_id');
    }
}
