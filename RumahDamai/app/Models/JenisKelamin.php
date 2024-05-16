<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamin';
    protected $fillable = ['id','jenis_kelamin'];
    
    public function anak(){
        return $this->hasMany(Anak::class);
    }
}
