<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_kelamin = [
            'Laki-laki',
            'Perempuan',
        ];

        foreach ($jenis_kelamin as $kelamin) {
            DB::table('jenis_kelamin')->insert([
                'jenis_kelamin' => $kelamin
            ]);
        }
    }
}
