<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProgram extends Model
{
    use HasFactory;

    protected $table = 'detail_program'; // Menentukan nama tabel yang digunakan

    protected $fillable = ['jenis_program', 'deskripsi', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
