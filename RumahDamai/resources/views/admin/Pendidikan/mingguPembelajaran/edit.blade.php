@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Minggu Pembelajaran</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mingguPembelajaran.update', $mingguPembelajaran->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="minggu_pembelajaran">Minggu Pembelajaran</label>
                <input type="text" class="form-control" name="minggu_pembelajaran"
                    value="{{ old('minggu_pembelajaran', $mingguPembelajaran->minggu_pembelajaran) }}" disabled>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggal_mulai"
                    value="{{ old('tanggal_mulai', $mingguPembelajaran->tanggal_mulai) }}">
            </div>

            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" class="form-control" name="tanggal_berakhir"
                    value="{{ old('tanggal_berakhir', $mingguPembelajaran->tanggal_berakhir) }}">
            </div>

            <a href="{{ route('mingguPembelajaran.index') }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
