@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Disabilitas</h2>

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

        <form action="{{ route('disabilitas.update', $jenisDisabilitas->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kategori_disabilitas">Kategori Disabilitas:</label>
                <input type="text" class="form-control" name="kategori_disabilitas"
                    value="{{ old('kategori_disabilitas', $jenisDisabilitas->kategori_disabilitas) }}">
            </div>

            <div class="form-group">
                <label for="jenis_disabilitas">Jenis Disabilitas:</label>
                <input type="text" class="form-control" name="jenis_disabilitas"
                    value="{{ old('jenis_disabilitas', $jenisDisabilitas->jenis_disabilitas) }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $jenisDisabilitas->deskripsi) }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
