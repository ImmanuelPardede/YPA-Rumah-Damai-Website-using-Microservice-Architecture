<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;

    protected $table = 'raport'; // Menentukan nama tabel yang digunakan

    protected $fillable = [

        'periode_bulan',
        'tahun',
        'area',
        'anak_id',
        'kemampuan',
        'kelas_kemampuan',
        'naratif',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }


}
