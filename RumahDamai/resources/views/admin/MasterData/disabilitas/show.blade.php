@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Disabilitas</h2>

        <div>
            <strong>Kategori Disabilitas:</strong> {{ $disabilitas->kategori_disabilitas }}<br>
            <strong>Jenis Disabilitas:</strong> {{ $disabilitas->jenis_disabilitas }}<br>
            <strong>Deskripsi:</strong> {{ $disabilitas->deskripsi ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
