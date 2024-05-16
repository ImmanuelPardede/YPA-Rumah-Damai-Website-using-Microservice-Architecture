<?php

namespace Database\Seeders;

use App\Models\LokasiPenugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasi_penugasan')->insert([
            'wilayah' => 'wilayah 1',
            'lokasi' => 'Lumban Silintong',
            'deskripsi' => 'Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba.'
        ]);
        DB::table('lokasi_penugasan')->insert([
            'wilayah' => 'wilayah 2',
            'lokasi' => 'Sawah Lamo',
            'deskripsi' => 'Desa Sawah Lamo, Kecamatan Andam Dewi Kabupaten Tapanuli Tengah.'
        ]);
    }
}
