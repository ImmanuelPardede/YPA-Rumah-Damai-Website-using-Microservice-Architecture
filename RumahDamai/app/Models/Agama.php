<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'agama'; 
    protected $fillable = ['id','agama'];

    public function anak(){
        return $this->hasMany(Anak::class);
    }
}
