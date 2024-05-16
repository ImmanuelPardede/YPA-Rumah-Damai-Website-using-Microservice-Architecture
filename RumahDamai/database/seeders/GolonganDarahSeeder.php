<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $golongan_darah = [
            'A',
            'B',
            'AB',
            'O'
        ];

        foreach ($golongan_darah as $golongan) {
            DB::table('golongan_darah')->insert([
                'golongan_darah' => $golongan,
            ]);
        }
    }
}
