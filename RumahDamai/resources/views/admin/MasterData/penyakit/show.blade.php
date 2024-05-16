@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Penyakit</h2>

        <div>
            <strong>Jenis Penyakit:</strong> {{ $jenis_penyakit['jenis_penyakit'] }}<br>
            <strong>Deskripsi:</strong> {{ $jenis_penyakit['deskripsi'] ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
