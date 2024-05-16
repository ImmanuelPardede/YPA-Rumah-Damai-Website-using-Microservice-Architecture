<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $table = 'tujuan'; // Menyatakan nama tabel yang terkait

    protected $fillable = [
        'detailppiA_id',
        'bina_diri',
        'sosialisasi_dan_komunikasi',
        'bekerja',
        'akademik',
        'jangka',
        // Jika ada kolom lain yang bisa diisi secara massal, tambahkan di sini
    ];

    public function detailPPIModelA()
    {
        return $this->belongsTo(DetailPPIModelA::class, 'detailppiA_id');
    }
}
