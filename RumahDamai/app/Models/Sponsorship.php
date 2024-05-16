<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $table = 'sponsorship';
    protected $fillable = ['jenis_sponsorship','deskripsi'];

    public function sponsor()
    {
        return $this->belongsToMany(Sponsor::class, 'sponsor_sponsorship', 'sponsor_id', 'sponsorship_id');
    }
}
