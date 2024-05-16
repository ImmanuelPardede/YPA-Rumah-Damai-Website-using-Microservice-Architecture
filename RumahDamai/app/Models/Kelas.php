<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'tahun_kurikulum_id', 'tahun_ajaran_id', 'semester_tahun_ajaran_id'];

    public function tahunKurikulum()
    {
        return $this->belongsTo(TahunKurikulum::class, 'tahun_kurikulum_id');
    }

    public function modulMateri()
    {
        return $this->hasMany(ModulMateri::class, 'kelas_id');
    }

    public function silabus()
    {
        return $this->hasMany(Silabus::class, 'kelas_id');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function semesterTahunAjaran()
    {
        return $this->belongsTo(SemesterTahunAjaran::class, 'semester_tahun_ajaran_id');
    }
}
