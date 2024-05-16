<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TingkatPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tingkat_pendidikan = [
            'Pendidikan Anak Usia Dini (PAUD)',
            'Sekolah Dasar (SD)',
            'Sekolah Menengah Pertama (SMP)',
            'Sekolah Menengah Atas (SMA) atau Sekolah Menengah Kejuruan (SMK)',
            'Pendidikan Menengah Kejuruan (SMK)',
            'Diploma I (D1)',
            'Diploma II (D2)',
            'Diploma III (D3)',
            'Diploma IV (D4)',
            'Sarjana (S1)',
            'Magister (S2)',
            'Doktor (S3)'
        ];

        foreach ($tingkat_pendidikan as $pendidikan) {
            DB::table('pendidikan')->insert([
                'tingkat_pendidikan' => $pendidikan
            ]);
        }
    }
}
