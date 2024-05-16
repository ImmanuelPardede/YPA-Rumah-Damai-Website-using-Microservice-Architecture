<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakDisabilitas extends Model
{
    use HasFactory;

    protected $table = 'anak_disabilitas';
    protected $fillable = ['anak_id', 'nama_lengkap', 'kategori_anak_disabilitas', 'jenis_anak_disabilitas','deskripsi', 'tipe_anak'];

    public function anak()
    {
        return $this->belongsTo(Anak::class); 
    }
}
