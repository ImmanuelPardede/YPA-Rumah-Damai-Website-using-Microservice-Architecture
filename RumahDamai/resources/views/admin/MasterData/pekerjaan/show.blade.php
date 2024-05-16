@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Pekerjaan</h2>

        <div>
            <strong>Jenis Pekerjaan:</strong> {{ $pekerjaan->jenis_pekerjaan }}<br>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
