@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Anak Non Disabilitas</h2>

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

        <form action="{{ route('anakNonDisabilitas.update', $jenisAnakNonDisabilitas->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kategori_anak_non_disabilitas">Kategori Anak Non Disabilitas<span
                        style="color: red">*</span></label>
                <input type="text" class="form-control" name="kategori_anak_non_disabilitas"
                    value="{{ old('kategori_anak_non_disabilitas', $jenisAnakNonDisabilitas->kategori_anak_non_disabilitas) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="jenis_anak_non_disabilitas">Jenis Anak Non Disabilitas<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="jenis_anak_non_disabilitas"
                    value="{{ old('jenis_anak_non_disabilitas', $jenisAnakNonDisabilitas->jenis_anak_non_disabilitas) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $jenisAnakNonDisabilitas->deskripsi) }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
