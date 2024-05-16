<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebutuhanDisabilitas extends Model
{
    use HasFactory;

    protected $table = 'kebutuhan_disabilitas';
    protected $fillable = ['id','jenis_kebutuhan_disabilitas','deskripsi'];

    public function anak(){
        return $this->hasMany(Anak::class);
    }
}






