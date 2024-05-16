<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisabilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disabilitas = [
            // Disabilitas Fisik
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Amputasi',
                'deskripsi' => 'Kondisi kehilangan anggota tubuh seperti lengan atau kaki.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Lumpuh layu',
                'deskripsi' => 'Hilangnya kemampuan untuk bergerak atau berjalan karena kerusakan pada sistem saraf.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Paraplegi',
                'deskripsi' => 'Hilangnya fungsi motorik atau sensorik pada bagian bawah tubuh.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Cerebral palsy',
                'deskripsi' => 'Gangguan gerakan dan koordinasi otot yang disebabkan oleh kerusakan otak sejak bayi.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Stroke',
                'deskripsi' => 'Kerusakan otak akibat penghentian aliran darah ke otak.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Kusta',
                'deskripsi' => 'Penyakit menular yang dapat menyebabkan kerusakan jaringan, saraf, dan kulit.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Fisik',
                'jenis_disabilitas' => 'Dwarfism (seckel syndrome)',
                'deskripsi' => 'Kondisi pertumbuhan yang menghasilkan tinggi badan yang sangat pendek.'
            ],

            // Disabilitas Intelektual
            [
                'kategori_disabilitas' => 'Disabilitas Intelektual',
                'jenis_disabilitas' => 'Lambat belajar',
                'deskripsi' => 'Keterbatasan dalam memahami dan memproses informasi dibandingkan dengan rata-rata usia sebaya.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Intelektual',
                'jenis_disabilitas' => 'Grahita',
                'deskripsi' => 'Keterbatasan mental yang menyebabkan kesulitan belajar dan menghadapi tugas-tugas sehari-hari.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Intelektual',
                'jenis_disabilitas' => 'Down syndrome',
                'deskripsi' => 'Kelainan genetik yang menyebabkan perkembangan fisik dan intelektual yang terhambat.'
            ],

            // Disabilitas Mental
            [
                'kategori_disabilitas' => 'Disabilitas Mental',
                'jenis_disabilitas' => 'Skizofrenia',
                'deskripsi' => 'Gangguan mental serius yang memengaruhi cara berpikir, merasakan, dan berperilaku.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Mental',
                'jenis_disabilitas' => 'Bipolar',
                'deskripsi' => 'Gangguan mood yang menyebabkan perubahan drastis antara episode mania dan depresi.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Mental',
                'jenis_disabilitas' => 'Depresi',
                'deskripsi' => 'Gangguan suasana hati yang ditandai dengan perasaan sedih, kehilangan minat, dan energi yang rendah.'
            ],

            // Disabilitas Sensorik
            [
                'kategori_disabilitas' => 'Disabilitas Sensorik',
                'jenis_disabilitas' => 'Tunanetra',
                'deskripsi' => 'Kehilangan penglihatan secara total.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Sensorik',
                'jenis_disabilitas' => 'Tuli',
                'deskripsi' => 'Kehilangan pendengaran secara total.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Sensorik',
                'jenis_disabilitas' => 'Tunawicara',
                'deskripsi' => 'Kesulitan dalam berbicara atau menggunakan bahasa secara verbal.'
            ],

            // Disabilitas Ganda atau Multi
            [
                'kategori_disabilitas' => 'Disabilitas Ganda atau Multi',
                'jenis_disabilitas' => 'Fisik dan Mental',
                'deskripsi' => 'Kombinasi antara disabilitas fisik dan gangguan mental.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Ganda atau Multi',
                'jenis_disabilitas' => 'Fisik dan Intelektual',
                'deskripsi' => 'Kombinasi antara disabilitas fisik dan keterbatasan intelektual.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Ganda atau Multi',
                'jenis_disabilitas' => 'Fisik dan Sensorik',
                'deskripsi' => 'Kombinasi antara disabilitas fisik dan gangguan sensorik.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Ganda atau Multi',
                'jenis_disabilitas' => 'Sensorik dan Mental',
                'deskripsi' => 'Kombinasi antara disabilitas sensorik dan gangguan mental.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Ganda atau Multi',
                'jenis_disabilitas' => 'Intelektual dan Sensorik',
                'deskripsi' => 'Kombinasi antara keterbatasan intelektual dan gangguan sensorik.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Ganda atau Multi',
                'jenis_disabilitas' => 'Mental dan Intelektual',
                'deskripsi' => 'Kombinasi antara gangguan mental dan keterbatasan intelektual.'
            ],

            // Disabilitas Neurologis
            [
                'kategori_disabilitas' => 'Disabilitas Neurologis',
                'jenis_disabilitas' => 'Gangguan pergerakan',
                "deskripsi' => 'Gangguan pada kontrol gerakan tubuh, seperti Parkinson's disease, Huntington's disease, atau dystonia."
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Neurologis',
                'jenis_disabilitas' => 'Gangguan epilepsi',
                'deskripsi' => 'Gangguan neurologis yang ditandai dengan serangan epilepsi.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Neurologis',
                'jenis_disabilitas' => 'Gangguan neurodegeneratif',
                'deskripsi' => 'Penurunan fungsi saraf yang progresif, seperti ALS (Amyotrophic Lateral Sclerosis) atau multiple sclerosis (MS).'
            ],

            // Disabilitas Lingkungan atau Aksesibilitas
            [
                'kategori_disabilitas' => 'Disabilitas Lingkungan atau Aksesibilitas',
                'jenis_disabilitas' => 'Keterbatasan mobilitas atau akses',
                'deskripsi' => 'Kesulitan dalam mengakses lingkungan atau fasilitas karena keterbatasan fisik, aksesibilitas yang buruk, atau fasilitas yang tidak ramah disabilitas.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Lingkungan atau Aksesibilitas',
                'jenis_disabilitas' => 'Keterbatasan teknologi atau akses digital',
                'deskripsi' => 'Kesulitan dalam menggunakan teknologi atau mengakses informasi digital karena keterbatasan aksesibilitas atau perangkat yang tidak mendukung.'
            ],

            // Disabilitas Medis atau Kesehatan Kronis
            [
                'kategori_disabilitas' => 'Disabilitas Medis atau Kesehatan Kronis',
                'jenis_disabilitas' => 'Penyakit kronis',
                'deskripsi' => 'Penyakit atau kondisi medis yang memerlukan perawatan jangka panjang, seperti diabetes, asma, atau penyakit jantung.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Medis atau Kesehatan Kronis',
                'jenis_disabilitas' => 'Kondisi medis kompleks',
                'deskripsi' => 'Kondisi medis yang kompleks dan memengaruhi fungsi organ atau sistem tubuh, seperti kanker, lupus, atau HIV/AIDS.'
            ],

            // Disabilitas Pembelajaran atau Pendidikan
            [
                'kategori_disabilitas' => 'Disabilitas Pembelajaran atau Pendidikan',
                'jenis_disabilitas' => 'Gangguan pembelajaran',
                'deskripsi' => 'Kesulitan dalam memahami atau memproses informasi, seperti dyslexia, dyscalculia, atau ADHD.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Pembelajaran atau Pendidikan',
                'jenis_disabilitas' => 'Gangguan bahasa atau komunikasi',
                'deskripsi' => 'Kesulitan dalam berbicara, memahami, atau mengungkapkan bahasa, seperti disfasia atau gangguan berbicara.'
            ],

            // Disabilitas Lingkungan atau Sosial
            [
                'kategori_disabilitas' => 'Disabilitas Lingkungan atau Sosial',
                'jenis_disabilitas' => 'Diskriminasi atau stigma',
                'deskripsi' => 'Dampak negatif dari diskriminasi atau stigmatisasi terhadap individu dengan disabilitas, seperti perlakuan tidak adil atau keterbatasan akses sosial.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Lingkungan atau Sosial',
                'jenis_disabilitas' => 'Keterbatasan akses',
                'deskripsi' => 'Kesulitan dalam mengakses layanan, fasilitas, atau informasi yang dapat membatasi partisipasi penuh dalam masyarakat.'
            ],

            // Disabilitas Psikososial atau Lingkungan
            [
                'kategori_disabilitas' => 'Disabilitas Psikososial atau Lingkungan',
                'jenis_disabilitas' => 'Trauma atau kejadian traumatis',
                'deskripsi' => 'Dampak dari kejadian traumatis, seperti PTSD (Post-Traumatic Stress Disorder) atau trauma akibat pelecehan.'
            ],
            [
                'kategori_disabilitas' => 'Disabilitas Psikososial atau Lingkungan',
                'jenis_disabilitas' => 'Stres kronis atau kondisi lingkungan yang tidak mendukung',
                'deskripsi' => 'Gangguan akibat tekanan atau stres kronis yang berasal dari lingkungan atau kondisi sosial tertentu.'
            ],
        ];

        DB::table('disabilitas')->insert($disabilitas);
    }
}

