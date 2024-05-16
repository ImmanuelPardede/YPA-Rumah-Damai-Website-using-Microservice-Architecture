<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    use HasFactory;

    protected $table = 'silabus';

    protected $fillable = [
        'tahun_kurikulum_id',
        'kelas_id',
        'user_id',
        'deskripsi',
        'hasil_kursus',
        'tipe_pembelajaran',
        'penilaian',
        'konten_kursus',
        'buku_pegangan_dan_referensi',
        'alat',
    ];

    public function tahunKurikulum()
    {
        return $this->belongsTo(TahunKurikulum::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
