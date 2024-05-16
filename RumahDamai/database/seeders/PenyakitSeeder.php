<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakit = [
            [
                'jenis_penyakit' => 'Hipertensi (Tekanan Darah Tinggi)',
                'deskripsi' => 'Kondisi di mana tekanan darah dalam arteri meningkat secara persisten. Hipertensi dapat meningkatkan risiko stroke, serangan jantung, gagal ginjal, dan masalah kesehatan lainnya.'
            ],
            [
                'jenis_penyakit' => 'Diabetes Melitus',
                'deskripsi' => 'Gangguan metabolisme yang ditandai oleh kadar glukosa darah tinggi akibat kekurangan insulin, resistensi insulin, atau keduanya. Komplikasi diabetes meliputi penyakit jantung, gagal ginjal, kerusakan saraf, dan masalah kesehatan lainnya.'
            ],
            [
                'jenis_penyakit' => 'Asma',
                'deskripsi' => 'Penyakit saluran napas kronis yang ditandai oleh peradangan dan penyempitan saluran napas, menyebabkan gejala seperti sesak napas, batuk, dan mengi.'
            ],
            [
                'jenis_penyakit' => 'Kanker',
                'deskripsi' => 'Penyakit yang ditandai oleh pertumbuhan sel-sel yang tidak normal dan dapat menyerang bagian tubuh mana pun. Ada banyak jenis kanker, termasuk kanker payudara, kanker paru-paru, kanker prostat, dan lain-lain.'
            ],
            [
                'jenis_penyakit' => 'Stroke',
                'deskripsi' => 'Kondisi yang terjadi ketika pasokan darah ke otak terganggu, menyebabkan kerusakan pada jaringan otak dan gejala seperti kelemahan otot, kesulitan berbicara, dan kehilangan koordinasi.'
            ],
            [
                'jenis_penyakit' => 'HIV/AIDS',
                'deskripsi' => 'Infeksi virus HIV (Human Immunodeficiency Virus) yang menyerang sistem kekebalan tubuh manusia. AIDS (Acquired Immunodeficiency Syndrome) adalah tahap lanjut dari infeksi HIV di mana sistem kekebalan tubuh sudah sangat lemah.'
            ],
            [
                'jenis_penyakit' => 'Osteoporosis',
                'deskripsi' => 'Penyakit tulang yang ditandai oleh penurunan massa tulang, menyebabkan tulang menjadi rapuh dan rentan patah.'
            ],
            [
                'jenis_penyakit' => 'Artritis',
                'deskripsi' => 'Kondisi peradangan pada sendi yang dapat menyebabkan rasa sakit, kemerahan, dan pembengkakan. Beberapa jenis artritis termasuk osteoartritis, artritis reumatoid, dan rematik.'
            ],
            [
                'jenis_penyakit' => 'Demensia',
                'deskripsi' => 'Kumpulan gejala yang memengaruhi fungsi kognitif seseorang, termasuk kehilangan memori, kesulitan berpikir, dan perubahan perilaku. Alzheimer adalah bentuk paling umum dari demensia.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Jantung Koroner',
                'deskripsi' => 'Penyakit arteri koroner yang disebabkan oleh penumpukan plak di dalam arteri yang memasok darah ke jantung. Ini dapat menyebabkan angina, serangan jantung, atau gagal jantung.'
            ],
            [
                'jenis_penyakit' => 'Autisme',
                'deskripsi' => 'Gangguan perkembangan neurologis yang memengaruhi perilaku, interaksi sosial, dan kemampuan berkomunikasi individu.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Parkinson',
                'deskripsi' => 'Gangguan neurodegeneratif yang memengaruhi gerakan tubuh, menyebabkan tremor, kekakuan otot, dan kesulitan bergerak.'
            ],
            [
                'jenis_penyakit' => 'Epilepsi',
                'deskripsi' => 'Gangguan neurologis yang ditandai oleh kejang yang berulang, disebabkan oleh aktivitas listrik yang abnormal di dalam otak.'
            ],
            [
                'jenis_penyakit' => 'Gagal Ginjal Kronis',
                'deskripsi' => 'Kerusakan ginjal yang terjadi secara bertahap dan irreversible, menyebabkan penurunan fungsi ginjal dan akumulasi zat-zat beracun dalam tubuh.'
            ],
            [
                'jenis_penyakit' => 'Obesitas',
                'deskripsi' => 'Kondisi kelebihan berat badan yang menyebabkan penumpukan lemak tubuh yang berlebihan, meningkatkan risiko penyakit jantung, diabetes, dan masalah kesehatan lainnya.'
            ],
            [
                'jenis_penyakit' => 'Demam Berdarah Dengue (DBD)',
                'deskripsi' => 'Penyakit yang disebabkan oleh virus dengue yang ditularkan oleh nyamuk Aedes. Gejala utamanya meliputi demam tinggi, nyeri otot dan sendi, ruam, dan pendarahan.'
            ],
            [
                'jenis_penyakit' => 'Kanker Payudara',
                'deskripsi' => 'Kanker yang berkembang dalam jaringan payudara. Gejalanya bisa berupa benjolan pada payudara, perubahan bentuk atau ukuran payudara, perubahan pada kulit payudara, atau keluarnya cairan dari puting susu.'
            ],
            [
                'jenis_penyakit' => 'Alzheimer',
                'deskripsi' => 'Penyakit neurodegeneratif progresif yang menyebabkan penurunan fungsi kognitif, seperti ingatan, pikiran, dan perilaku. Gejalanya termasuk gangguan memori, kesulitan berbicara, dan kesulitan melakukan tugas sehari-hari.'
            ],
            [
                'jenis_penyakit' => 'Diabetes Tipe 2',
                'deskripsi' => 'Penyakit yang ditandai dengan kadar gula darah tinggi karena tubuh tidak dapat menggunakan insulin dengan efektif. Gejalanya termasuk sering merasa haus, sering buang air kecil, kelelahan, dan penurunan berat badan.'
            ],
            [
                'jenis_penyakit' => 'Artritis Rheumatoid',
                'deskripsi' => 'Penyakit autoimun yang menyebabkan peradangan pada sendi, yang dapat menyebabkan nyeri, pembengkakan, dan kekakuan sendi.'
            ],
            [
                'jenis_penyakit' => 'Gagal Ginjal',
                'deskripsi' => 'Kondisi di mana ginjal kehilangan kemampuan untuk menyaring limbah dan cairan dari darah dengan efektif. Gejalanya termasuk kelelahan, pembengkakan, dan penurunan fungsi ginjal.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Crohn',
                'deskripsi' => 'Salah satu jenis penyakit inflamasi usus yang dapat memengaruhi seluruh saluran pencernaan, menyebabkan gejala seperti diare, nyeri perut, dan penurunan berat badan.'
            ],
            [
                'jenis_penyakit' => 'Autisme',
                'deskripsi' => 'Gangguan perkembangan neurologis yang ditandai dengan kesulitan dalam interaksi sosial, komunikasi, dan perilaku yang terbatas dan repetitif.'
            ],
            [
                'jenis_penyakit' => 'Kanker Prostat',
                'deskripsi' => 'Kanker yang berkembang dalam kelenjar prostat pada pria. Gejala awalnya mungkin tidak terlihat, tetapi bisa termasuk kesulitan buang air kecil, nyeri saat buang air kecil, atau penurunan aliran urin.'
            ],
            [
                'jenis_penyakit' => 'Anemia',
                'deskripsi' => 'Kondisi di mana jumlah sel darah merah atau kadar hemoglobin dalam darah lebih rendah dari normal, yang dapat menyebabkan kelelahan, pucat, dan sesak napas.'
            ],
            [
                'jenis_penyakit' => 'Gangguan Kecemasan',
                'deskripsi' => 'Gangguan mental yang ditandai oleh rasa cemas yang berlebihan, ketegangan, dan ketakutan yang tidak proporsional terhadap stimulus tertentu.'
            ],
            [
                'jenis_penyakit' => 'Hipertiroidisme',
                'deskripsi' => 'Kondisi di mana kelenjar tiroid menghasilkan terlalu banyak hormon tiroid, menyebabkan gejala seperti peningkatan denyut jantung, penurunan berat badan, dan kelelahan.'
            ],
            [
                'jenis_penyakit' => 'Fibromyalgia',
                'deskripsi' => 'Kondisi kronis yang ditandai dengan nyeri otot dan sendi yang menyeluruh, kelelahan, dan gangguan tidur.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Celiac',
                'deskripsi' => 'Penyakit autoimun di mana tubuh bereaksi terhadap gluten, protein yang ditemukan dalam gandum, barley, dan jelai, menyebabkan kerusakan pada usus dan gejala seperti diare, nyeri perut, dan penurunan berat badan.'
            ],
            [
                'jenis_penyakit' => 'Skizofrenia',
                'deskripsi' => 'Gangguan mental serius yang memengaruhi persepsi, pikiran, dan perilaku seseorang. Gejalanya meliputi halusinasi, delusi, dan gangguan pemikiran.'
            ],
            [
                'jenis_penyakit' => 'Endometriosis',
                'deskripsi' => 'Kondisi di mana jaringan yang biasanya melapisi rahim tumbuh di luar rahim, menyebabkan nyeri panggul, haid yang tidak teratur, dan kesulitan hamil.'
            ],
            [
                'jenis_penyakit' => 'Anoreksia Nervosa',
                'deskripsi' => 'Gangguan makan yang ditandai dengan ketakutan akan berat badan, penolakan untuk menjaga berat badan normal, dan pola makan yang tidak sehat.'
            ],
            [
                'jenis_penyakit' => 'Hipotiroidisme',
                'deskripsi' => 'Kondisi di mana kelenjar tiroid tidak menghasilkan cukup hormon tiroid, yang dapat menyebabkan kelelahan, penambahan berat badan, dan penurunan suhu tubuh.'
            ],
            [
                'jenis_penyakit' => 'Osteoarthritis',
                'deskripsi' => 'Merupakan jenis arthritis yang paling umum, dimana tulang rawan yang melapisi ujung tulang di sendi mengalami kerusakan dan penyusutan. Gejalanya meliputi nyeri sendi, pembengkakan, dan kekakuan.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Lyme',
                'deskripsi' => 'Penyakit infeksi bakteri yang ditularkan oleh gigitan kutu yang terinfeksi. Gejala awalnya dapat mirip dengan flu, termasuk demam, nyeri otot, dan lelah, namun jika tidak diobati dapat berkembang menjadi gejala serius seperti masalah neurologis dan artritis.'
            ],
            [
                'jenis_penyakit' => 'Polio (Poliomielitis)',
                'deskripsi' => 'Infeksi virus yang menyerang sistem saraf dan dapat menyebabkan kelumpuhan permanen atau bahkan kematian. Meskipun telah ada vaksin yang efektif, masih terdapat kasus polio di beberapa wilayah.'
            ],
            [
                'jenis_penyakit' => 'Katarak',
                'deskripsi' => 'Kondisi di mana lensa mata menjadi keruh, menyebabkan penglihatan kabur atau buram. Ini merupakan penyebab umum kehilangan penglihatan terkait usia.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Hepatitis',
                'deskripsi' => 'Merupakan peradangan pada hati yang dapat disebabkan oleh infeksi virus hepatitis (A, B, C, D, atau E), konsumsi alkohol berlebihan, atau penyakit autoimun. Gejalanya termasuk nyeri perut, kelelahan, mual, dan kulit dan mata yang kuning (jaundice).'
            ],
            [
                'jenis_penyakit' => 'Sindrom Obstruksi Apnea Tidur (Sleep Apnea)',
                'deskripsi' => 'Kondisi yang ditandai oleh henti napas berulang selama tidur. Hal ini dapat menyebabkan gangguan tidur, kelelahan, dan peningkatan risiko penyakit jantung dan stroke.'
            ],
            [
                'jenis_penyakit' => 'Gagal Jantung',
                'deskripsi' => 'Kondisi di mana jantung gagal memompa darah dengan efektif ke seluruh tubuh. Gejala termasuk sesak napas, kelelahan, pembengkakan kaki atau perut, dan detak jantung yang tidak teratur.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Chikungunya',
                'deskripsi' => 'Penyakit virus yang ditularkan oleh nyamuk Aedes, menyebabkan demam, nyeri sendi yang parah, ruam, dan gejala flu.'
            ],
            [
                'jenis_penyakit' => 'Cystic Fibrosis',
                'deskripsi' => 'Merupakan penyakit genetik yang memengaruhi kelenjar yang menghasilkan lendir, keringat, dan cairan pencernaan, menyebabkan lendir yang kental dan lengket di saluran pernapasan dan pencernaan.'
            ],
            [
                'jenis_penyakit' => 'Gagal Hati',
                'deskripsi' => 'Kondisi di mana hati tidak berfungsi sebagaimana mestinya, menyebabkan penumpukan toksin dalam tubuh. Gejalanya termasuk kelelahan, peningkatan berat badan, nyeri perut, dan pembengkakan kaki.'
            ],
            [
                'jenis_penyakit' => 'Penyakit Huntington',
                'deskripsi' => 'Merupakan gangguan genetik yang menyebabkan kerusakan progresif pada sel-sel otak, menyebabkan perubahan perilaku, gangguan gerakan, dan penurunan fungsi kognitif.'
            ],
            [
                'jenis_penyakit' => 'Tumor Otak',
                'deskripsi' => 'Istilah yang mengacu pada pertumbuhan abnormal sel-sel di otak. Gejalanya dapat bervariasi tergantung pada lokasi dan ukuran tumor, termasuk sakit kepala, gangguan penglihatan, mual, atau kejang.'
            ],
            [
                'jenis_penyakit' => 'Fibroid Uterus',
                'deskripsi' => 'Tumor jinak yang tumbuh di rahim sebagian besar pada wanita usia subur. Mereka bisa menyebabkan gejala seperti nyeri panggul, menstruasi yang berat, atau kesulitan hamil.'
            ],
            [
                'jenis_penyakit' => 'Anakusis',
                'deskripsi' => 'Kehilangan pendengaran total atau sebagian yang bisa bersifat sementara atau permanen.'
            ],
        ];

        DB::table('penyakit')->insert($penyakit);
    }
}
