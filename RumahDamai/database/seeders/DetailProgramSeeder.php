<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('detail_program')->insert([
            'program_id' =>'1',
            'jenis_program' => 'Kelestarian Lingkungan',
            'deskripsi' => 'Dalam melestarikan lingkungan, anak-anak belajar membuat setiap karya yang ramah lingkungan dengan mendaur ulang sampah, serta turut dalam penanaman tumbuhan muda.',
        ]);

        DB::table('detail_program')->insert([
            'program_id' =>'1',
            'jenis_program' => 'Kesehatan Jasmani dan Rohani',
            'deskripsi' => 'Dalam mendukung kesehatan Rohani, Kami melakukan Ibadah sekali seminggu. Didalam YPA Rumah Damai menjunjung tinggi nilai-nilai pluralisme. Setiap anak yang beragama Muslim diajari oleh Guru yang beragama Muslim sedangkan anak yang beragama Kristen diajari oleh guru yang beragama Kristen. Dalam mendukung kesehatan Jasmani, kami melakukan berbagi gizi dan Olahraga. diselenggarakan melalui kelas futsal dan berenang.',
        ]);

        DB::table('detail_program')->insert([
            'program_id' =>'1',
            'jenis_program' => 'Kelestarian Budaya Lokal',
            'deskripsi' => 'Dalam menunjang kelestarian budaya kontekstual, kami mengajarkan Bahasa suku, tarian, filosofi rumah adat dan tulisan-tulisan budaya kontekstual dan wisata kebudayaan.',
        ]);
    }
}
