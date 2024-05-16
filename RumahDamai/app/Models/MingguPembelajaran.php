<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MingguPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'minggu_pembelajaran';
    protected $fillable = ['minggu_pembelajaran', 'tanggal_mulai', 'tanggal_berakhir'];
}
