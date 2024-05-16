<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raport {{ $raport->anak->nama_lengkap }}</title>
    <style>
            @page {
        size: landscape;
    }
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h2{
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table-100{
            width: 100%;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        .no-border-table td, .no-border-table th {
            border: none; /* Remove borders from all cells */
            padding: 8px;
            text-align: left;
        }

        .atasan{
  margin-top: 20px;
}
.yayasan {
    font-size: 24px;
    font-size: 3vw;
    text-align: center; /* Menyatukan teks ke tengah */
}

.garis1{
  border-top:3px solid black;
  height: 2px;
  border-bottom:1px solid black;
}
#tls{
 text-align:right; 
}
    </style>
</head>
<body>
    <header>
        <div class="atasan">
            <h1 class="yayasan"><strong>YAYASAN PENDIDIKAN ANAK RUMAH DAMAI</strong></h1>
            <h2 class="yayasan"><strong>LAPORAN HASIL BELAJAR SISWA</strong></h2>
            <h5 class="yayasan"><strong>@if ($anak->lokasi_id == 1)Desa Lumban Silintong, Kecamatan
                Balige, Kabupaten Toba
                @elseif ($anak->lokasi_id == 2)
                Desa Sawah Lamo, Kecamatan Andam
                Dewi
                Kabupaten Tapanuli Tengah.
                    @else
                    Data Alamat Tidak Tersedia
                @endif
            </strong></h5>

            </div>
        </div>
      </header>
      <hr class="garis1"/>

        <div class="row">
            <div class="col">
                <div id="tgl-srt" class="col-md-6">
                    <p id="tls">PPI No   :   01</p>
                      
                  </div>
                <table class="no-border-table"> <!-- Add custom class to the table -->
                    <tbody>
                        <tr>
                            <td>Periode Bulan</td>
                            <td>: {{ $raport->periode_bulan }} {{ $raport->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $raport->anak->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>NIA</td>
                            <td>: {{ $raport->anak->nia }}</td>
                        </tr>
                        <tr>
                            <td>Kelas Kronologis:</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="">
                    <thead>
                        <tr>
                            <td rowspan="2" style="width: 50px ;font-weight: bold; background-color: #ccc;">No</td>
                            <td rowspan="2"style="width: 70px ;font-weight: bold;background-color: #ccc;">Area</td>
                            <td rowspan="2"style="width: 150px ;font-weight: bold;background-color: #ccc;">Kemampuan yang dipelajari</td>
                            <td colspan="2" style="width: 300px">Hasil Yang Dicapai</td>
                        </tr>
                        <tr>
                            <td style="width: 150px ;font-weight: bold;background-color: #ccc;">Kelas kemampuan</td>
                            <td style="font-weight: bold;background-color: #ccc;">Naratif</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                $prevArea = null;
                $nomorTampil = 0;
                @endphp

                        @foreach($detailraports as $index => $detail)
                        <tr>
                            @if ($detail->area !== $prevArea)
                            @php
                            $nomorTampil++;
                            @endphp
                            <td>{{ $nomorTampil }}</td>
                        @else
                            <td></td>
                        @endif
                            <td style="font-weight: bold;">
                                @if ($detail->area !== $prevArea)
                                    {{ $detail->area }}
                                    @php
                                    $prevArea = $detail->area;
                                    @endphp
                                @endif
                            </td>
                                <td style="font-weight: bold;">{{ $detail->kemampuan }}</td>
                            <td>{{ $detail->kelas_kemampuan }}</td>
                            <td style="text-align: left;">{{ $detail->naratif }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>
