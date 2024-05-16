@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Riwayat Medis</h2>

        <div>
            <strong>Riwayat Perawatan:</strong> {{ $riwayatmedis->riwayat_perawatan ?? 'Data tidak tersedia'}}<br>
            <strong>Riwayat Perilaku:</strong> {{ $riwayatmedis->riwayat_perilaku ?? 'Data tidak tersedia'}}<br>
            <strong>Deskripsi Riwayat:</strong> {{ $riwayatmedis->deskripsi_riwayat ?? 'Data tidak tersedia'}}<br>
            <strong>Kondisi:</strong> {{ $riwayatmedis->kondisi ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
     </div>
@endsection
