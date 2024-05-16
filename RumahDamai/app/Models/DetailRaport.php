<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRaport extends Model
{
    use HasFactory;

    protected $table = 'detailraports'; // Tentukan nama tabel yang sesuai

    protected $fillable = [
        'raport_id',
        'area',
        'kemampuan',
        'kelas_kemampuan',
        'naratif',
    ];

    public function raport()
    {
        return $this->belongsTo(Raport::class);
    }
}
