@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Lokasi Penugasan</h2>

        <div>
            <strong>Nama Wilayah:</strong> {{ $lokasi->wilayah }}<br>
            <strong>Lokasi:</strong> {{ $lokasi->lokasi ?? 'Data tidak tersedia'}}<br>
            <strong>Deskripsi:</strong> {{ $lokasi->deskripsi ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
