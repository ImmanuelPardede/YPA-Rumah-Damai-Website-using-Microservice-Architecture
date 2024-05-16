<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $donasi = [
            [
                'jenis_donasi' => 'Donasi Keuangan',
                'deskripsi' => 'Memberikan sumbangan uang tunai atau transfer bank kepada organisasi atau keluarga yang memiliki anak-anak disabilitas untuk memenuhi kebutuhan dasar, seperti perawatan medis, pendidikan khusus, dan peralatan medis.'
            ],
            [
                'jenis_donasi' => 'Donasi Peralatan Medis',
                'deskripsi' => 'Menyumbangkan peralatan medis khusus seperti alat bantu dengar, atau alat bantu lainnya yang dibutuhkan oleh anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Pendidikan',
                'deskripsi' => 'Memberikan sumbangan untuk biaya pendidikan anak-anak disabilitas, termasuk biaya sekolah, buku, alat-alat pembelajaran khusus, atau dukungan untuk program pendidikan khusus.'
            ],
            [
                'jenis_donasi' => 'Donasi Pengembangan Keterampilan',
                'deskripsi' => 'Mendukung program-program yang membantu anak-anak disabilitas untuk mengembangkan keterampilan mereka, seperti kursus terapi fisik, terapi wicara, atau pelatihan keterampilan hidup mandiri.'
            ],
            [
                'jenis_donasi' => 'Donasi Transportasi',
                'deskripsi' => 'Memberikan bantuan untuk transportasi, baik itu biaya perjalanan atau bahkan menyumbangkan kendaraan khusus yang dapat membantu mobilitas anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Alat Bantu Mobilitas',
                'deskripsi' => 'Seperti kursi roda, tongkat, atau walker yang dapat membantu anak-anak disabilitas untuk bergerak lebih mandiri.'
            ],
            [
                'jenis_donasi' => 'Donasi Alat Bantu Komunikasi',
                'deskripsi' => 'Seperti komunikator berbasis gambar atau perangkat lunak komunikasi alternatif yang membantu anak-anak disabilitas dalam berkomunikasi.'
            ],
            [
                'jenis_donasi' => 'Donasi Biaya Medis',
                'deskripsi' => 'Mencakup biaya pemeriksaan kesehatan rutin, perawatan medis, atau intervensi medis khusus yang diperlukan oleh anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Pendidikan Inklusif',
                'deskripsi' => 'Mendukung sekolah inklusif atau program pendidikan khusus yang memfasilitasi anak-anak disabilitas untuk belajar bersama dengan teman sebaya mereka.'
            ],
            [
                'jenis_donasi' => 'Donasi Terapi dan Intervensi',
                'deskripsi' => 'Seperti terapi fisik, terapi wicara, terapi okupasi, atau terapi lainnya yang membantu dalam pengembangan keterampilan dan kemampuan anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Peralatan Edukasi',
                'deskripsi' => 'Seperti komputer atau perangkat lunak edukatif yang dirancang khusus untuk anak-anak disabilitas agar dapat belajar dengan lebih efektif.'
            ],
            [
                'jenis_donasi' => 'Donasi Sarana Olahraga',
                'deskripsi' => 'Mendukung pembangunan atau peningkatan fasilitas olahraga yang dapat diakses oleh anak-anak disabilitas untuk berpartisipasi dalam kegiatan fisik.'
            ],
            [
                'jenis_donasi' => 'Donasi Ketersediaan Makanan Khusus',
                'deskripsi' => 'Membantu biaya makanan khusus atau diet yang diperlukan oleh anak-anak disabilitas karena kondisi medis tertentu.'
            ],
            [
                'jenis_donasi' => 'Donasi Alat Bantu Sensorik',
                'deskripsi' => 'Seperti kacamata khusus, alat bantu dengar, atau alat bantu penglihatan yang membantu meningkatkan persepsi sensorik anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Terapi Hewan',
                'deskripsi' => 'Menyumbangkan dana untuk terapi dengan hewan seperti terapi dengan anjing atau kuda, yang telah terbukti membantu anak-anak disabilitas dalam pengembangan sosial, emosional, dan fisik mereka.'
            ],
            [
                'jenis_donasi' => 'Donasi Perawatan Medis Rumah',
                'deskripsi' => 'Mendukung biaya perawatan medis yang diberikan di rumah bagi anak-anak disabilitas yang memerlukan perawatan jangka panjang atau kompleks.'
            ],
            [
                'jenis_donasi' => 'Donasi Pemeliharaan dan Perbaikan Peralatan Medis',
                'deskripsi' => 'Mengalokasikan dana untuk perawatan, pemeliharaan, atau perbaikan alat-alat medis yang sudah dimiliki oleh keluarga anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Bantuan Psikologis',
                'deskripsi' => 'Memberikan dukungan finansial untuk layanan konseling atau terapi psikologis bagi anak-anak disabilitas dan keluarga mereka dalam mengatasi tantangan mental dan emosional.'
            ],
            [
                'jenis_donasi' => 'Donasi Peralatan Terapi',
                'deskripsi' => 'Mendukung penyediaan peralatan terapi yang diperlukan, seperti bola terapi, terapi mainan, atau matras terapi, untuk membantu dalam pengembangan motorik dan sensorik anak-anak disabilitas.'
            ],
            [
                'jenis_donasi' => 'Donasi Layanan Pendampingan',
                'deskripsi' => 'Menyumbangkan dana untuk layanan pendampingan yang membantu anak-anak disabilitas dalam kegiatan sehari-hari, seperti belajar di sekolah, bermain di taman, atau berpartisipasi dalam kegiatan sosial.'
            ],
            [
                'jenis_donasi' => 'Donasi Kegiatan Rekreasi dan Liburan',
                'deskripsi' => 'Menyediakan dana untuk kegiatan rekreasi atau liburan yang dirancang khusus untuk anak-anak disabilitas, sehingga mereka dapat mengalami pengalaman yang menyenangkan dan mendidik.'
            ],
            [
                'jenis_donasi' => 'Donasi Teknologi Assistif',
                'deskripsi' => 'Memberikan dana untuk pembelian atau penyediaan teknologi assistif seperti perangkat lunak khusus, aplikasi, atau perangkat keras yang membantu anak-anak disabilitas dalam belajar, berkomunikasi, atau melakukan aktivitas sehari-hari.'
            ],
            [
                'jenis_donasi' => 'Donasi Program Inklusi Sekolah',
                'deskripsi' => 'Mendukung program-program yang mempromosikan inklusi sekolah, termasuk pelatihan bagi guru dan fasilitator untuk mendukung anak-anak disabilitas dalam lingkungan pendidikan mainstream.'
            ],
            [
                'jenis_donasi' => 'Donasi Program Pemantauan Kesehatan',
                'deskripsi' => 'Memberikan dana untuk program pemantauan kesehatan jangka panjang bagi anak-anak disabilitas yang membutuhkan perawatan dan perhatian khusus untuk kondisi kesehatan mereka.'
            ],
            [
                'jenis_donasi' => 'Donasi Dukungan Psikososial',
                'deskripsi' => 'Mendukung penyediaan layanan dukungan psikososial seperti konseling, terapi kelompok, atau program dukungan emosional bagi anak-anak disabilitas dan keluarga mereka.'
            ],
            [
                'jenis_donasi' => 'Donasi Program Kemandirian',
                'deskripsi' => 'Menyumbangkan dana untuk program-program yang bertujuan meningkatkan kemandirian anak-anak disabilitas, termasuk pelatihan keterampilan hidup mandiri, pelatihan kemampuan sosial, dan dukungan untuk integrasi sosial.'
            ],
        ];

        DB::table('donasi')->insert($donasi);
    }
}
