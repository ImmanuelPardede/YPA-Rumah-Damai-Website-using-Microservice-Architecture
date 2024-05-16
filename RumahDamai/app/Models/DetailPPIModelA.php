<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPPIModelA extends Model
{
    use HasFactory;

    protected $table = 'detail_PPI_Model_A'; // Menyatakan nama tabel yang terkait

    protected $fillable = [
        'ppiA_id',
        'gambaran_sensory',
        'data_medis',
        'hal_disukai',
        'kondisi_lain',
    ];


    public function ppiA()
    {
        return $this->belongsTo(PPI_Model_A::class, 'ppiA_id');
    }

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'detailppiA_id');
    }
    
}
