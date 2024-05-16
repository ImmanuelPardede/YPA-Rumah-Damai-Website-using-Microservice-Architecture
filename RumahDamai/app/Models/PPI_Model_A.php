<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPI_Model_A extends Model
{
    use HasFactory;

    protected $table = 'PPI_Model_A'; // Menyatakan nama tabel yang terkait

    protected $fillable = [
        'anak_id',
        // Jika ada kolom lain yang bisa diisi secara massal, tambahkan di sini
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }
}
