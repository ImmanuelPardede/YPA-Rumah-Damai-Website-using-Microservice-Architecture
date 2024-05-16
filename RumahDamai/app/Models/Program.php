<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program'; // Menentukan nama tabel yang digunakan

    protected $fillable = ['img_program', 'kelas'];

    public function detailPrograms()
    {
        return $this->hasMany(DetailProgram::class);
    }
}
