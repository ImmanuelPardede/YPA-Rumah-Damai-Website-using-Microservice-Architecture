<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about')->insert([
            'latar_belakang' => 'Yayasan Pendidikan Anak Rumah Damai atau yang sering dikenal masyarakat adalah Rumah Damai berdiri pada tanggal 25 Januari 2022 yang dahulu bernama Komunitas Rumah Dame. Komunitas ini dimulai dari sebuah desa di pinggiran Danau Toba yaitu Desa Lumban Silintong dengan mengajak anak-anak di desa tersebut. Pada 11 Maret 2023, komunitas Rumah Dame resmi terdaftar di Kemenkuham dengan SK Pendirian nomor AHU-004325.AH.01.04.Tahun 2023 dan berubah nama menjadi Yayasan Pendidikan Anak Rumah Damai.',
            'img_yayasan' => 'uploads/visitor/about/dummy1.jpg',
            'img_wilayah1' => 'uploads/visitor/about/dummy1.jpg',
            'img_wilayah2' => 'uploads/visitor/about/dummy1.jpg',
            'visi' => 'Mewujudnyatakan kedamaian bagi setiap anak',
            'misi' => '<ul><li>Memberikan pendidikan kreatif dan kontekstual kepada anak</li><li>Memberikan ruang kepada setiap anak untuk mengespresikan dirinya melalui kemampuan yang dimiliki.</li><li>Memberikan ruang bagi setiap anak untuk sharing setiap aspek-aspek kehidupan yang terjadi dalam kehidupannya</li></ul>',
            'wilayah1' => 'Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba.',
            'wilayah2' => 'Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah.'
        ]);

    }
}
