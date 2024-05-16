<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakNonDisabilitas extends Model
{
    use HasFactory;

    protected $table = 'anak_non_disabilitas';
    protected $fillable = ['anak_id','nama_lengkap', 'kategori_anak_non_disabilitas', 'jenis_anak_non_disabilitas','deskripsi', 'tipe_anak'];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
