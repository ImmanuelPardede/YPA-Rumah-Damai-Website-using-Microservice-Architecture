<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTuaWali extends Model
{
    use HasFactory;

    protected $table = 'orang_tua_wali';

    protected $fillable = [
        'anak_id',
        'agama_id',
        'nama_ibu',
        'nama_ayah',
        'nik_ayah',
        'nik_ibu',
        'tanggal_lahir_ayah',
        'tanggal_lahir_ibu',
        'alamat_orangtua',
        'pendidikan_ayah_id',
        'pekerjaan_ayah_id',
        'no_hp_ayah',
        'pendidikan_ibu_id',
        'pekerjaan_ibu_id',
        'no_hp_ibu',
        'nama_wali',
        'alamat_wali',
        'pekerjaan_wali_id',
        'tanggal_lahir_wali',
        'no_hp_wali',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function pekerjaan_ayah()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_ayah_id');
    }

    public function pekerjaan_ibu()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_ibu_id');
    }

    public function pekerjaan_wali()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_wali_id');
    }

    public function pendidikan_ayah()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_ayah_id');
    }
    
    public function pendidikan_ibu()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_ibu_id');
    }


    
}
