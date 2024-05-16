<?php

namespace Database\Seeders;

use App\Models\CarouselItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
            DB::table('carousel_items')->insert([
                'image_url' => 'uploads/visitor/carousel/dummy1.jpg',
                'caption' => 'Selamat Datang',
                'subcaption' => 'Sistem Informasi Yayasan Pendidikan Anak Rumah Damai',
            ]);
}
}