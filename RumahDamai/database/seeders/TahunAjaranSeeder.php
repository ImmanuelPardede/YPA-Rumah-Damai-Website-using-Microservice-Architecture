<?php

namespace Database\Seeders;

use App\Models\LokasiPenugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_ajaran')->insert([
            'tahun_ajaran' => '2019',
        ]);
        DB::table('tahun_ajaran')->insert([
            'tahun_ajaran' => '2020',
        ]);
        DB::table('tahun_ajaran')->insert([
            'tahun_ajaran' => '2021',
        ]);
        DB::table('tahun_ajaran')->insert([
            'tahun_ajaran' => '2022',
        ]);
        DB::table('tahun_ajaran')->insert([
            'tahun_ajaran' => '2023',
        ]);
        DB::table('tahun_ajaran')->insert([
            'tahun_ajaran' => '2024',
        ]);
    }
}
