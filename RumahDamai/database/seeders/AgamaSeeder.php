<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = [
            'Islam',
            'Kristen Protestan',
            'Kristen Katolik',
            'Buddha',
            'Hindu',
            'Konghucu',
        ];

        foreach ($agama as $nama_agama) {
            DB::table('agama')->insert([
                'agama' => $nama_agama,
            ]);
        }
    }
}
