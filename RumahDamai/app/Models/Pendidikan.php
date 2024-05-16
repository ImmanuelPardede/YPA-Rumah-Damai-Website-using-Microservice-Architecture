<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';
    protected $fillable = ['id','tingkat_pendidikan'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
