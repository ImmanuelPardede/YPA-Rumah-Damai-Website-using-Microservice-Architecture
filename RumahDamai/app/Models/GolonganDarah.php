<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    use HasFactory;
    protected $table = 'golongan_darah';
    protected $fillable = ['id','golongan_darah'];


    public function anak(){
        return $this->hasMany(Anak::class);
    }
}


