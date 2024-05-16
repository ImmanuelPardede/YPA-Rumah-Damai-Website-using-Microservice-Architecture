<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_berita')->insert([
            'kategori' => 'Pengumuman Akademis',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Penghargaan dan Prestasi',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Kegiatan Ekstrakurikuler',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Kemitraan dan Kolaborasi',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Inovasi Teknologi Pendidikan',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Kesehatan dan Kesejahteraan',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Pembangunan Fasilitas',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Penggalangan Dana dan Donasi',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Pendidikan Inklusif',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Kemitraan Industri',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Donasi',
        ]);
        DB::table('kategori_berita')->insert([
            'kategori' => 'Sponsor',
        ]);

    }
}
