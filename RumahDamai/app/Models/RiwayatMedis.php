<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMedis extends Model
{
    use HasFactory;

    protected $table = 'riwayat_medis';
    protected $fillable = ['id', 'anak_id', 'penyakit_id', 'riwayat_perawatan', 'riwayat_perilaku', 'deskripsi_riwayat', 'kondisi'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id', 'id');
    }

    public function penyakit()
    {
        return $this->hasOne(Penyakit::class, 'id', 'penyakit_id');
    }
}
