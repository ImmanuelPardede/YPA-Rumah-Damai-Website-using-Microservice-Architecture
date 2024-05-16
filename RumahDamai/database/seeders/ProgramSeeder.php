<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program')->insert([
            'img_program' => 'uploads/visitor/program/dummy1.jpg',
            'kelas' => '<ul><li>Kelas Spritualitas</li><li>Kelas Karya Seni dan Budaya</li><li>Kelas Bahasa Inggris</li><li>Kelas Musik Tradisional</li><li>Kelas Futsal</li><li>Pendampingan Anak Berkebutuhan Khusus</li></ul>',
        ]);
    }
}
