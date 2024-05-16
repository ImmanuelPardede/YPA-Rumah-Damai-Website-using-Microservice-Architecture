@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Detail Jenis Pekerjaan</h2>

        <div>
            <strong>Jenis Pekerjaan:</strong> {{ $jenis_pekerjaan['jenis_pekerjaan'] }}<br>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
