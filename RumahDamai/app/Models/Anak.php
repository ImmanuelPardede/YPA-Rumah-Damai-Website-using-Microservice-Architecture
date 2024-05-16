<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $fillable = [
        'foto_profil',
        'nia',
        'nama_lengkap',
        'agama_id',
        'jenis_kelamin_id',
        'golongan_darah_id',
        'kebutuhan_disabilitas_id',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_masuk',
        'tanggal_keluar',
        'disukai',
        'tidak_disukai',
        'alamat',
        'kelebihan',
        'kekurangan',
        'status',
        'tipe_anak',
        'lokasi_id',
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }

    public function golonganDarah()
    {
        return $this->belongsTo(GolonganDarah::class, 'golongan_darah_id');
    }

    public function kebutuhanDisabilitas()
    {
        return $this->belongsTo(KebutuhanDisabilitas::class, 'kebutuhan_disabilitas_id');
    }

    public function riwayatMedis()
    {
        return $this->hasMany(RiwayatMedis::class, 'anak_id', 'id');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function anakDisabilitas()
    {
        return $this->hasOne(AnakDisabilitas::class, 'anak_id');
    }

    public function anakNonDisabilitas()
    {
        return $this->hasOne(AnakNonDisabilitas::class, 'anak_id');
    }

    public function lokasiTugas()
    {
        return $this->belongsTo(LokasiTugas::class, 'lokasi_id');
    }

    
}
