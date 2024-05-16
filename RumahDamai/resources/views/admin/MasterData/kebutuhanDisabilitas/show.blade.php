@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Kebutuhan Disabilitas</h2>

        <div>
            <strong>Jenis Kebutuhan:</strong> {{ $kebutuhanDisabilitas->jenis_kebutuhan_disabilitas }}<br>
            <strong>Deskripsi:</strong> {{ $kebutuhanDisabilitas->deskripsi ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
