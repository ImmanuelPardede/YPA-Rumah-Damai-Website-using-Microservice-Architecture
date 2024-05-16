<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterTahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'semester_tahun_ajaran';
    protected $fillable = ['semester_tahun_ajaran'];
}
