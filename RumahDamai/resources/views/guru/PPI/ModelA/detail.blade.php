@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Detail Data Anak Didik</h1>
            <p>Nama Anak: {{ $ppiA->anak->nama_lengkap }}</p>
            <p>Dibuat Pada: {{ $ppiA->created_at }}</p>

            <h3>Detail Tujuan</h3>
            @if ($detailppiA->isNotEmpty())
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambaran Sensory</th>
                            <th>Data Medis</th>
                            <th>Hal Disukai</th>
                            <th>Kondisi Lain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailppiA as $key => $detail)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{!! $detail->gambaran_sensory !!}</td>
                            <td>{!! $detail->data_medis !!}</td>
                            <td>{!! $detail->hal_disukai !!}</td>
                            <td>{!! $detail->kondisi_lain !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data detail tujuan yang tersedia untuk data ini.</p>
            @endif

            @if ($tujuan->isNotEmpty())
                <h3>Detail Tujuan</h3>
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jangka</th>
                            <th>Bina Diri</th>
                            <th>Sosialisasi Dan Komunikasi</th>
                            <th>Bekerja</th>
                            <th>Akademik</th>
                            <th>Kondisi Lain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tujuan as $key => $oke)
                        <tr>
                            <td>{!! $key + 1 !!}</td>
                            <td>{!! $oke->jangka !!}</td>
                            <td>{!! $oke->bina_diri !!}</td>
                            <td>{!! $oke->sosialisasi_dan_komunikasi !!}</td>
                            <td>{!! $oke->bekerja !!}</td>
                            <td>{!! $oke->akademik !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data tujuan yang tersedia untuk detail ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection
