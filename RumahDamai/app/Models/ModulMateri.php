<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulMateri extends Model
{
    use HasFactory;

    protected $table = 'modul_materi';
    protected $fillable = [
        'kelas_id',
        'nama_materi',
        'minggu_pembelajaran_id',
        'tahun_kurikulum_id',
        'user_id',
        'file_modul',
        'deskripsi',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mingguPembelajaran()
    {
        return $this->belongsTo(MingguPembelajaran::class, 'minggu_pembelajaran_id');
    }

    public function tahunKurikulum()
    {
        return $this->belongsTo(TahunKurikulum::class, 'tahun_kurikulum_id');
    }

    public function jadwalPembelajaran()
    {
        return $this->hasMany(JadwalPembelajaran::class);
    }

    public function lokasiPenugasan()
    {
        return $this->belongsTo(LokasiTugas::class, 'lokasi_penugasan_id');
    }
}
