<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Damai</title>
    <style>
        .atasan {
            margin-top: 10px; /* Ubah nilai margin-top sesuai kebutuhan */
            margin-bottom: 10px; /* Ubah nilai margin-bottom sesuai kebutuhan */
            text-align: center;
        }

        .atasan img {
            margin-right: 20px; /* Jarak antara gambar dan teks */
            width: 75px;
        }

        .konten {
            text-align: left; /* Mengatur teks agar berada di kiri gambar */
        }

        .atasan h2, .atasan h3, .atasan h4 {
            margin: 5px 0; /* Mengatur margin atas dan bawah */
        }

        .garis1{
            border-top:3px solid black;
            height: 2px;
            border-bottom:1px solid black;
            margin-top: 10px; /* Ubah nilai margin-top sesuai kebutuhan */
            margin-bottom: 10px; /* Ubah nilai margin-bottom sesuai kebutuhan */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <div class="atasan">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents('uploads/logo/logo.png')) }}" alt="">
            <div class="konten" style="text-align: center;">
                <h2>YAYASAN PENDIDIKAN ANAK RUMAH DAMAI</h2>
                <h3>@if($anak->lokasi_id == 1)Lumban Silintong @elseif ($anak->lokasi_id == 2) Andam Dewi @endif</h3>
                <h4>@if ($anak->lokasi_id == 1)Jl. Pemandian, Lumban Silintong, Balige 22651, Toba, Sumatra Utara, Indonesia
                    @elseif ($anak->lokasi_id == 2)Sawah Lamo, Andam Dewi 22651, Tapanuli Tengah, Sumatra Utara, Indonesia
                    </p>
                        @else
                        Data Alamat Tidak Tersedia
                    @endif</h4>
            </div>
        </div>
    </header>

        <hr class="garis1">

        <h3 style="text-align: center">Data Anak</h3>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $anak->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Nomor Induk Anak (INA)</th>
                <td>{{ $anak->nia }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $anak->agama->agama }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $anak->jenisKelamin->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Golongan Darah</th>
                <td>{{ $anak->golonganDarah->golongan_darah }}</td>
            </tr>
            <tr>
                <th>Tempat,Tanggal Lahir</th>
                <td>{{ $anak->tempat_lahir}}, {{ $anak->tanggal_lahir}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $anak->alamat }}</td>
            </tr>
            <tr>
                <th>Masuk</th>
                <td>{{ $anak->tanggal_masuk }}</td>
            </tr>
            
            <tr>
                <th>Status</th>
                <td>{{ $anak->status }}</td>
            </tr>
            <tr>
                <th>Disukai</th>
                <td>{!!$anak->disukai!!}</td>
            </tr>
            <tr>
                <th>Tidak Disukai</th>
                <td>{!!$anak->tidak_disukai!!}</td>
            </tr>
            <tr>
                <th>Kelebihan</th>
                <td>{!!$anak->kelebihan!!}</td>
            </tr>
            <tr>
                <th>Kekurangan</th>
                <td>{!!$anak->kekurangan!!}</td>
            </tr>
            <tr>
                <th>Foto</th>
                <td style="text-align: center">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents($anak->foto_profil)) }}" style="width: 150px; height: 170px; border: 1px solid #000;">
                </td>
            </tr>
            <!-- Tambahkan baris tambahan sesuai kebutuhan -->
        </table>
</body>
</html>
