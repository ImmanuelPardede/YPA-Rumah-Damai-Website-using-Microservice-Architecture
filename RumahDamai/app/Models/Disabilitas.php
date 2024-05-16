<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disabilitas extends Model
{
    use HasFactory;

    protected $table = 'disabilitas';
    protected $fillable = ['kategori_disabilitas', 'jenis_disabilitas','deskripsi'];

    // public function anakDisabilitas(){
    //     return $this->belongsToMany(AnakDisabilitas::class, 'disabilitas_id');
    // }
}
