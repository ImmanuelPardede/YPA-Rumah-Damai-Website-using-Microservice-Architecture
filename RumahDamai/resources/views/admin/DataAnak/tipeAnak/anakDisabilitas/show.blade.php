@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Anak Disabilitas</h2>

        <div>
            <strong>Nama Anak:</strong> {{ $anakDisabilitas->anak->nama_lengkap }}<br>
            <strong>Kategori Anak Disabilitas:</strong> {{ $anakDisabilitas->kategori_anak_disabilitas ?? 'Data tidak tersedia'}}<br>
            <strong>Jenis Anak Disabilitas:</strong> {{ $anakDisabilitas->jenis_anak_disabilitas ?? 'Data tidak tersedia'}}<br>
            <strong>Deskripsi:</strong> {{ $anakDisabilitas->deskripsi ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
