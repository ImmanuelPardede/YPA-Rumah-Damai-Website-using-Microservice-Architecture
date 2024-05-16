<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <h3>@if($user->lokasi_penugasan_id == 1)Lumban Silintong @elseif ($user->lokasi_penugasan_id == 2) Andam Dewi @endif</h3>
                <h4>@if ($user->lokasi_penugasan_id == 1)Jl. Pemandian, Lumban Silintong, Balige 22651, Toba, Sumatra Utara, Indonesia
                    @elseif ($user->lokasi_penugasan_id == 2)Sawah Lamo, Andam Dewi 22651, Kabupaten Tapanuli Tengah, Sumatra Utara, Indonesia
                        @else
                        Data Alamat Tidak Tersedia
                    @endif</h4>
            </div>
        </div>
        <hr class="garis1">

        <h3 style="text-align: center">Data Diri Pegawai</h3>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $user->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $user->status }}</td>
            </tr>
            <tr>
                <th>Nomor Indup Pegawai (NIP)</th>
                <td>{{ $user->nip }}</td>
            </tr>
            <tr>
                <th>Golongan Darah</th>
                <td>{{ $user->golonganDarah->golongan_darah }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $user->jenisKelamin->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $user->agama->agama }}</td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <td>{{ $user->pendidikan->tingkat_pendidikan }}</td>
            </tr>
            
            <tr>
                <th>Alamat</th>
                <td>{{ $user->alamat }}</td>
            </tr>
            <tr>
                <th>No Telephon</th>
                <td>{{ $user->no_telepon }}</td>
            </tr>
            <tr>
                <th>Pengalaman</th>
                <td>{!! $user->pengalaman !!}</td>
            </tr>
            <tr>
                <th>Tanggal Masuk</th>
                <td>{{ $user->tanggal_masuk }}</td>
            </tr>
            <tr>
                <th>Lokasi Penugasan</th>
                <td>{{ $user->lokasiPenugasan->lokasi }}</td>
            </tr>
            <tr>
                <th>Foto</th>
                <td style="text-align: center">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents('uploads/pegawai/' . $user->foto)) }}" style="width: 150px; height: 170px; border: 1px solid #000;">
                </td>
            </tr>
            
            
            <!-- Tambahkan baris tambahan sesuai kebutuhan -->
        </table>

    </header>
</body>
</html>
