<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorship = [
            [
                'jenis_sponsorship' => 'Sponsorship Pendidikan',
                'deskripsi' => 'Menyediakan dana untuk biaya pendidikan anak-anak disabilitas, termasuk biaya sekolah, les tambahan, atau program pendidikan khusus.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Olahraga atau Seni',
                'deskripsi' => 'Mendukung anak-anak disabilitas untuk berpartisipasi dalam kegiatan olahraga atau seni dengan menyediakan dana untuk biaya pendaftaran, peralatan, atau pelatihan.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Kesehatan',
                'deskripsi' => 'Menyediakan dana untuk biaya perawatan medis, terapi fisik, terapi wicara, atau peralatan medis yang dibutuhkan oleh anak-anak disabilitas.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Pekerjaan dan Pelatihan',
                'deskripsi' => 'Memberikan dukungan untuk program-program pelatihan keterampilan atau kesempatan kerja bagi anak-anak disabilitas yang sudah dewasa agar dapat mandiri secara finansial.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Acara Khusus',
                'deskripsi' => 'Mendukung acara-acara khusus atau program-program yang dirancang khusus untuk anak-anak disabilitas, seperti seminar, workshop, atau festival inklusi.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Pendidikan Khusus',
                'deskripsi' => 'Menyediakan dana untuk biaya sekolah di sekolah khusus atau lembaga pendidikan khusus bagi anak-anak disabilitas.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Rehabilitasi',
                'deskripsi' => 'Mendukung program-program rehabilitasi yang membantu anak-anak disabilitas untuk mengembangkan keterampilan fisik, kognitif, atau sosial mereka.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Aksesibilitas',
                'deskripsi' => 'Membiayai perbaikan atau penyesuaian rumah, sekolah, atau fasilitas umum lainnya agar dapat diakses dengan mudah oleh anak-anak disabilitas.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Kegiatan Sosial dan Rekreasi',
                'deskripsi' => 'Memberikan dana untuk kegiatan sosial, rekreasi, atau liburan yang diadakan khusus untuk anak-anak disabilitas.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Pelatihan Orang Tua',
                'deskripsi' => 'Mendukung program pelatihan atau dukungan bagi orang tua anak-anak disabilitas agar dapat memberikan perawatan dan dukungan yang terbaik bagi anak-anak mereka.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Peralatan Musik atau Seni',
                'deskripsi' => 'Menyediakan dana untuk pembelian alat musik atau bahan seni yang dapat membantu anak-anak disabilitas mengekspresikan diri melalui seni.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Transportasi Sekolah',
                'deskripsi' => 'Menyediakan dana untuk biaya transportasi ke dan dari sekolah bagi anak-anak disabilitas yang memerlukan bantuan khusus.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Kegiatan Ekstrakurikuler',
                'deskripsi' => 'Mendukung partisipasi anak-anak disabilitas dalam kegiatan ekstrakurikuler seperti klub buku, klub olahraga, atau klub kegiatan lainnya.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Penempatan Kerja',
                'deskripsi' => 'Memberikan dana untuk program penempatan kerja atau magang bagi anak-anak disabilitas yang mempersiapkan mereka untuk bekerja di tempat kerja yang inklusif.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Kesehatan Mental',
                'deskripsi' => 'Mendukung program-program kesehatan mental atau konseling yang dirancang khusus untuk membantu anak-anak disabilitas dalam mengatasi tantangan emosional atau psikologis.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Kelas Khusus atau Program Pendampingan',
                'deskripsi' => 'Mendukung biaya untuk kelas khusus atau program pendampingan yang dirancang khusus untuk memenuhi kebutuhan pendidikan anak-anak disabilitas.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Pelatihan Keterampilan',
                'deskripsi' => 'Memberikan dana untuk program pelatihan keterampilan khusus seperti pelatihan kerja atau pelatihan keterampilan hidup mandiri bagi anak-anak disabilitas yang sudah dewasa.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Kemitraan Komunitas',
                'deskripsi' => 'Menyediakan dana untuk program-program yang memfasilitasi integrasi sosial anak-anak disabilitas dalam komunitas lokal mereka melalui kolaborasi dengan organisasi atau perusahaan setempat.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Pelatihan Inklusi',
                'deskripsi' => 'Mendukung pelatihan bagi guru dan staf sekolah tentang pendekatan inklusif dalam pendidikan, untuk memastikan anak-anak disabilitas dapat sepenuhnya terlibat dalam lingkungan sekolah.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Kemandirian',
                'deskripsi' => 'Memberikan dana untuk program-program yang bertujuan untuk meningkatkan kemandirian anak-anak disabilitas dalam hal kegiatan sehari-hari, seperti mandi, berpakaian, atau makan sendiri.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Seni dan Ekspresi',
                'deskripsi' => 'Mendukung program seni dan ekspresi, seperti musik, seni lukis, atau drama, yang membantu anak-anak disabilitas untuk mengekspresikan diri dan mengembangkan bakat mereka.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Pengembangan Keterampilan Sosial',
                'deskripsi' => 'Memberikan dana untuk program-program yang membantu anak-anak disabilitas dalam mengembangkan keterampilan sosial, komunikasi, dan interaksi dengan orang lain.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Inklusi Masyarakat',
                'deskripsi' => 'Mendukung program-program yang mendorong inklusi anak-anak disabilitas dalam berbagai kegiatan masyarakat, seperti acara budaya, festival, atau kegiatan amal lokal.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Aksesibilitas Transportasi Umum',
                'deskripsi' => 'Mendukung proyek-proyek untuk meningkatkan aksesibilitas transportasi umum bagi anak-anak disabilitas, termasuk peningkatan fasilitas, pelatihan staf, atau pengadaan kendaraan khusus.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Pemberdayaan Komunitas',
                'deskripsi' => 'Memberikan dana untuk program-program yang memfasilitasi inklusi dan pemberdayaan komunitas anak-anak disabilitas melalui pelatihan keterampilan, pendampingan, atau pengembangan usaha kecil.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Keluarga',
                'deskripsi' => 'Mendukung program-program yang memberikan dukungan langsung kepada keluarga anak-anak disabilitas, termasuk layanan penasihat keluarga, pertemuan kelompok, atau dukungan keuangan darurat.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Peralatan Olahraga Adaptif',
                'deskripsi' => 'Menyediakan dana untuk pembelian atau penyediaan peralatan olahraga adaptif seperti kursi roda olahraga, sepeda khusus, atau alat-alat lain yang memungkinkan anak-anak disabilitas untuk berpartisipasi dalam aktivitas olahraga.'
            ],
            [
                'jenis_sponsorship' => 'Sponsorship Program Pengembangan Bakat',
                'deskripsi' => 'Memberikan dukungan finansial untuk program-program yang memfasilitasi pengembangan bakat dan minat anak-anak disabilitas dalam berbagai bidang seperti seni, musik, atau olahraga.'
            ],
        ];

        DB::table('sponsorship')->insert($sponsorship);
    }
}
