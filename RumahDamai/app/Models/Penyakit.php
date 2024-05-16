<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $fillable = ['id','jenis_penyakit','deskripsi'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
