<?php

namespace Database\Seeders;

use App\Models\LokasiPenugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TahunKurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_kurikulum')->insert([
            'tahun_kurikulum' => '2019',
        ]);
        DB::table('tahun_kurikulum')->insert([
            'tahun_kurikulum' => '2020',
        ]);
    }
}
