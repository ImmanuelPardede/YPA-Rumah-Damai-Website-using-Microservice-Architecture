<?php

namespace Database\Seeders;

use App\Models\LokasiPenugasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MingguPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 1',
            'tanggal_mulai' => '2024-04-01',
            'tanggal_berakhir' => '2024-04-07',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 2',
            'tanggal_mulai' => '2024-04-08',
            'tanggal_berakhir' => '2024-04-14',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 3',
            'tanggal_mulai' => '2024-04-15',
            'tanggal_berakhir' => '2024-04-21',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 4',
            'tanggal_mulai' => '2024-04-22',
            'tanggal_berakhir' => '2024-04-28',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 5',
            'tanggal_mulai' => '2024-04-29',
            'tanggal_berakhir' => '2024-05-05',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 6',
            'tanggal_mulai' => '2024-05-06',
            'tanggal_berakhir' => '2024-05-12',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 7',
            'tanggal_mulai' => '2024-05-13',
            'tanggal_berakhir' => '2024-05-19',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 8',
            'tanggal_mulai' => '2024-05-20',
            'tanggal_berakhir' => '2024-05-26',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 9',
            'tanggal_mulai' => '2024-05-27',
            'tanggal_berakhir' => '2024-06-02',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 10',
            'tanggal_mulai' => '2024-06-03',
            'tanggal_berakhir' => '2024-06-09',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 11',
            'tanggal_mulai' => '2024-06-10',
            'tanggal_berakhir' => '2024-06-16',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 12',
            'tanggal_mulai' => '2024-06-17',
            'tanggal_berakhir' => '2024-06-23',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 13',
            'tanggal_mulai' => '2024-06-24',
            'tanggal_berakhir' => '2024-06-30',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 14',
            'tanggal_mulai' => '2024-07-01',
            'tanggal_berakhir' => '2024-07-07',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 15',
            'tanggal_mulai' => '2024-07-08',
            'tanggal_berakhir' => '2024-07-14',
            'lokasi_penugasan_id' => '1',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 16',
            'tanggal_mulai' => '2024-07-15',
            'tanggal_berakhir' => '2024-07-21',
            'lokasi_penugasan_id' => '1',
        ]);



        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 1',
            'tanggal_mulai' => '2024-04-01',
            'tanggal_berakhir' => '2024-04-07',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 2',
            'tanggal_mulai' => '2024-04-08',
            'tanggal_berakhir' => '2024-04-14',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 3',
            'tanggal_mulai' => '2024-04-15',
            'tanggal_berakhir' => '2024-04-21',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 4',
            'tanggal_mulai' => '2024-04-22',
            'tanggal_berakhir' => '2024-04-28',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 5',
            'tanggal_mulai' => '2024-04-29',
            'tanggal_berakhir' => '2024-05-05',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 6',
            'tanggal_mulai' => '2024-05-06',
            'tanggal_berakhir' => '2024-05-12',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 7',
            'tanggal_mulai' => '2024-05-13',
            'tanggal_berakhir' => '2024-05-19',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 8',
            'tanggal_mulai' => '2024-05-20',
            'tanggal_berakhir' => '2024-05-26',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 9',
            'tanggal_mulai' => '2024-05-27',
            'tanggal_berakhir' => '2024-06-02',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 10',
            'tanggal_mulai' => '2024-06-03',
            'tanggal_berakhir' => '2024-06-09',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 11',
            'tanggal_mulai' => '2024-06-10',
            'tanggal_berakhir' => '2024-06-16',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 12',
            'tanggal_mulai' => '2024-06-17',
            'tanggal_berakhir' => '2024-06-23',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 13',
            'tanggal_mulai' => '2024-06-24',
            'tanggal_berakhir' => '2024-06-30',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 14',
            'tanggal_mulai' => '2024-07-01',
            'tanggal_berakhir' => '2024-07-07',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 15',
            'tanggal_mulai' => '2024-07-08',
            'tanggal_berakhir' => '2024-07-14',
            'lokasi_penugasan_id' => '2',
        ]);

        DB::table('minggu_pembelajaran')->insert([
            'minggu_pembelajaran' => 'Minggu 16',
            'tanggal_mulai' => '2024-07-15',
            'tanggal_berakhir' => '2024-07-21',
            'lokasi_penugasan_id' => '2',
        ]);
    }
}
