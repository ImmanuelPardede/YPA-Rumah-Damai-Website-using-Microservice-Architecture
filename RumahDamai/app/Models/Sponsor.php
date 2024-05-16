<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsor';
    protected $fillable = [
        'nama_sponsor',
        'email_sponsor',
        'tanggal_sponsor',
        'no_telepon_sponsor',
        'deskripsi',
        'jumlah_sponsor',
        'foto_sponsor',
    ];

    public function sponsorship()
    {
        return $this->belongsToMany(Sponsorship::class, 'sponsor_sponsorship', 'sponsor_id', 'sponsorship_id');
    }
}
