<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KebutuhanDisabilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kebutuhan_disabilitas = [
            [
                'jenis_kebutuhan_disabilitas' => 'Kacamata atau Lensa Kontak Khusus',
                'deskripsi' => 'Kacamata atau lensa kontak khusus adalah alat bantu visual yang dirancang khusus untuk anak-anak dengan gangguan penglihatan. Kacamata dapat disesuaikan dengan resep yang tepat sesuai dengan kebutuhan mata anak, baik untuk koreksi penglihatan jarak dekat maupun jarak jauh. Lensa kontak juga dapat digunakan untuk koreksi penglihatan, terutama jika anak memiliki ketidaknyamanan atau kesulitan menggunakan kacamata.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Alat Bantu Dengar (Hearing Aids)',
                'deskripsi' => 'Alat bantu dengar adalah perangkat elektronik yang membantu meningkatkan kemampuan pendengaran anak dengan gangguan pendengaran. Alat ini biasanya dikenakan di belakang atau di dalam telinga, dan berfungsi untuk memperkuat suara sehingga anak dapat mendengar dengan lebih jelas. Alat bantu dengar tersedia dalam berbagai ukuran dan model, termasuk yang dirancang khusus untuk anak-anak dengan gaya hidup aktif.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Implan Koklea',
                'deskripsi' => 'Implan koklea adalah perangkat medis yang ditanamkan secara bedah untuk membantu anak dengan gangguan pendengaran yang parah atau tuli sensorineural. Implan ini bekerja dengan merangsang saraf pendengaran langsung, mengubah sinyal suara menjadi impuls listrik yang diteruskan ke otak. Implan koklea biasanya cocok untuk anak-anak yang tidak mendapatkan manfaat optimal dari alat bantu dengar konvensional.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Kursi Roda Manual atau Listrik',
                'deskripsi' => 'Kursi roda manual atau listrik adalah perangkat mobilitas yang membantu anak dengan gangguan mobilitas untuk bergerak secara mandiri. Kursi roda manual biasanya dioperasikan dengan mendorong atau ditarik oleh pengguna atau orang lain, sementara kursi roda listrik memiliki motor yang digerakkan oleh baterai untuk membantu anak bergerak dengan lebih mudah.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Penyangga atau Walker',
                'deskripsi' => 'Penyangga atau walker adalah perangkat mobilitas yang membantu anak dengan kelemahan kaki atau ketidakseimbangan untuk berjalan dengan lebih stabil. Penyangga ini biasanya terdiri dari kerangka logam dengan roda dan pegangan, yang dapat digunakan sebagai penyangga saat berjalan.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Tongkat atau Kruk',
                'deskripsi' => 'Tongkat atau kruk adalah perangkat mobilitas yang digunakan oleh anak dengan gangguan keseimbangan atau kelemahan pada salah satu atau kedua kaki. Tongkat atau kruk memberikan dukungan tambahan saat berjalan, membantu anak untuk menjaga keseimbangan dan mengurangi risiko jatuh.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Terapi Fisik',
                'deskripsi' => 'Peralatan terapi fisik, seperti bola terapi, balok paralel, atau treadmill khusus, digunakan dalam program rehabilitasi untuk membantu anak meningkatkan kekuatan, keseimbangan, dan koordinasi tubuh mereka. Peralatan ini membantu anak untuk mengembangkan keterampilan motorik dan memperbaiki fungsi fisik mereka.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Alat Bantu Komunikasi',
                'deskripsi' => 'Alat bantu komunikasi, seperti komunikator atau aplikasi AAC (Augmentative and Alternative Communication), digunakan oleh anak dengan gangguan komunikasi untuk berkomunikasi dengan orang lain. Alat ini mencakup berbagai jenis perangkat, mulai dari buku komunikasi sederhana hingga aplikasi digital yang canggih, yang memungkinkan anak untuk mengekspresikan kebutuhan, pikiran, dan emosi mereka.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Komputer atau Perangkat Lunak Khusus',
                'deskripsi' => 'Komputer atau perangkat lunak khusus digunakan untuk membantu anak dalam belajar atau komunikasi. Perangkat lunak ini mencakup keyboard besar atau mouse yang mudah dijangkau, program pembelajaran interaktif, dan aplikasi khusus yang dirancang untuk memfasilitasi pembelajaran dan komunikasi anak dengan disabilitas.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Terapi Okupasi',
                'deskripsi' => 'Peralatan terapi okupasi, seperti putty, perangkat untuk latihan koordinasi mata-tangan, atau alat pengukur tekanan, digunakan dalam terapi okupasi untuk membantu anak dalam mengembangkan keterampilan motorik halus, kemandirian, dan kemampuan fungsional sehari-hari.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Buku-Buku atau Sumber Daya Pendidikan Khusus',
                'deskripsi' => 'Buku-buku atau sumber daya pendidikan khusus, seperti buku teks braille atau audio, digunakan untuk menyediakan materi pembelajaran yang disesuaikan dengan kebutuhan belajar anak dengan disabilitas. Sumber daya ini membantu anak untuk mengakses informasi dan belajar sesuai dengan gaya belajar mereka.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Layanan Pendidikan Khusus',
                'deskripsi' => 'Layanan pendidikan khusus, seperti guru pendamping atau spesialis pendidikan khusus, disediakan untuk membantu anak dengan disabilitas dalam memperoleh pendidikan yang sesuai dengan kebutuhan mereka. Layanan ini mencakup pembimbingan individual, pengajaran yang disesuaikan, dan dukungan tambahan di dalam kelas.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Terapi Wicara atau Terapi Bicara',
                'deskripsi' => 'Terapi wicara atau terapi bicara digunakan untuk membantu anak dalam mengembangkan keterampilan komunikasi, termasuk pemahaman bahasa, pengucapan, dan ekspresi verbal. Terapi ini mencakup berbagai teknik dan strategi untuk membantu anak dalam berkomunikasi secara efektif.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Khusus untuk Terapi Motorik',
                'deskripsi' => 'Peralatan khusus untuk terapi motorik, seperti mainan berbasis sensorik atau peralatan terapi berat, digunakan dalam terapi untuk membantu anak dalam meningkatkan keterampilan motorik halus atau motorik kasar mereka. Peralatan ini membantu anak untuk mengembangkan koordinasi tubuh, kekuatan otot, dan keterampilan fungsional lainnya.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Keamanan',
                'deskripsi' => 'Peralatan keamanan, seperti pelindung atau pengaman kursi roda, kursi mobil khusus, atau helm pelindung, digunakan untuk melindungi anak dari cedera atau risiko lainnya. Peralatan ini dirancang khusus untuk memenuhi kebutuhan keamanan anak dengan disabilitas.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Konseling atau Terapi Emosional',
                'deskripsi' => 'Konseling atau terapi emosional disediakan untuk membantu anak dalam mengatasi tantangan sosial atau emosional yang terkait dengan disabilitas mereka. Terapi ini mencakup dukungan emosional, pemecahan masalah, dan pengembangan keterampilan koping.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Medis',
                'deskripsi' => 'Peralatan medis, seperti nebulizer, alat pengukur gula darah, atau alat pemberi insulin, digunakan untuk mengelola kondisi medis yang mungkin dimiliki anak dengan disabilitas. Peralatan ini membantu anak dalam memantau kesehatan mereka dan mengelola kondisi medis secara efektif.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Diet Khusus atau Suplemen Nutrisi',
                'deskripsi' => 'Diet khusus atau suplemen nutrisi disesuaikan dengan kebutuhan medis anak, seperti diet rendah gluten atau diet tinggi protein, digunakan untuk mengelola kondisi medis yang mungkin dimiliki anak. Diet ini direkomendasikan oleh profesional kesehatan untuk mendukung kesehatan dan kesejahteraan anak.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Kebersihan Pribadi',
                'deskripsi' => 'Peralatan kebersihan pribadi, seperti kursi mandi atau pegangan tambahan, shower chair, atau kursi toilet khusus, digunakan untuk membantu anak dalam menjaga kebersihan pribadi mereka dengan aman dan nyaman. Peralatan ini dirancang khusus untuk memenuhi kebutuhan kebersihan anak dengan disabilitas.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Fasilitas Aksesibilitas',
                'deskripsi' => 'Fasilitas aksesibilitas, seperti ram yang sesuai atau lift, digunakan untuk memastikan anak dapat mengakses fasilitas publik atau lingkungan rumah dengan mudah. Fasilitas ini dirancang untuk memenuhi kebutuhan aksesibilitas anak dengan disabilitas, sehingga mereka dapat berpartisipasi secara penuh dalam kehidupan sehari-hari.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Terapi Musik atau Seni',
                'deskripsi' => 'Terapi musik atau seni adalah jenis terapi yang menggunakan musik atau seni sebagai alat untuk membantu anak dalam mengembangkan keterampilan sosial, emosional, dan kognitif mereka. Terapi ini dapat mencakup berbagai kegiatan musik dan seni yang disesuaikan dengan kebutuhan anak.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Keselamatan Tambahan',
                'deskripsi' => 'Peralatan keselamatan tambahan, seperti sistem peringatan kebakaran yang sesuai dengan kebutuhan anak atau alat pemantauan kesehatan otomatis, digunakan untuk meningkatkan keamanan anak dengan disabilitas. Peralatan ini dirancang khusus untuk mendeteksi atau mencegah risiko cedera atau keadaan darurat lainnya.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Perangkat Lunak atau Aplikasi Khusus',
                'deskripsi' => 'Perangkat lunak atau aplikasi khusus digunakan untuk membantu dalam pelacakan jadwal atau pengaturan tugas anak dengan disabilitas. Perangkat lunak ini mencakup aplikasi kalender, pengingat obat, atau program manajemen waktu lainnya yang dapat disesuaikan dengan kebutuhan anak.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Penunjang Aktivitas Sehari-hari',
                'deskripsi' => 'Peralatan penunjang aktivitas sehari-hari, seperti botol minum khusus, alat makan yang disesuaikan, atau alat bantu pakaian, digunakan untuk membantu anak dalam menjalani kegiatan sehari-hari dengan lebih mandiri. Peralatan ini dirancang khusus untuk memenuhi kebutuhan anak dengan disabilitas dalam menjalani kehidupan sehari-hari.'
            ],
            [
                'jenis_kebutuhan_disabilitas' => 'Peralatan Rekreasi atau Olahraga',
                'deskripsi' => 'Peralatan rekreasi atau olahraga yang disesuaikan, seperti kursi roda olahraga, sepeda tiga roda, atau alat renang yang dapat diakses, digunakan untuk memfasilitasi partisipasi anak dengan disabilitas dalam kegiatan olahraga atau rekreasi. Peralatan ini dirancang untuk memenuhi kebutuhan aksesibilitas dan keselamatan anak saat berpartisipasi dalam kegiatan fisik.'
            ],
        ];

        DB::table('kebutuhan_disabilitas')->insert($kebutuhan_disabilitas);
    }
}
