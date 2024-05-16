<?php

namespace Database\Seeders;

use App\Models\LokasiPenugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SemesterTahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semester_tahun_ajaran')->insert([
            'semester_tahun_ajaran' => 'Ganjil',
        ]);
        DB::table('semester_tahun_ajaran')->insert([
            'semester_tahun_ajaran' => 'Genap',
        ]);
    }
}
