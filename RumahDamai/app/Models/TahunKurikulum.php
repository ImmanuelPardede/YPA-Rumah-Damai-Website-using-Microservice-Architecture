<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunKurikulum extends Model
{
    use HasFactory;

    protected $table = 'tahun_kurikulum';
    protected $fillable = ['tahun_kurikulum'];
}
