@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Anak Non Disabilitas</h2>

        <!-- Tampilkan pesan kesalahan validasi jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anakNonDisabilitas.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="kategori_anak_non_disabilitas">Kategori Anak Non Disabilitas:</label>
                <input type="text" class="form-control" name="kategori_anak_non_disabilitas" value="{{ old('kategori_anak_non_disabilitas') }}">
            </div>

            <div class="form-group">
                <label for="jenis_anak_non_disabilitas">Jenis Anak Non Disabilitas:</label>
                <input type="text" class="form-control" name="jenis_anak_non_disabilitas" value="{{ old('jenis_anak_non_disabilitas') }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
