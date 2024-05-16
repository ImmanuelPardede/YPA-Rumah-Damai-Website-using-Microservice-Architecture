@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Sponsorship</h2>

        <div>
            <strong>Jenis Sponsorship:</strong> {{ $sponsorship->jenis_sponsorship }}<br>
            <strong>Deskripsi:</strong> {{ $sponsorship->deskripsi ?? 'Data tidak tersedia'}}
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
