<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';
    protected $fillable = ['id','jenis_pekerjaan'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
