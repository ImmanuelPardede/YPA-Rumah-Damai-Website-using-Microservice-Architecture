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

        <form action="{{ route('anakDisabilitas.update', $jenisAnakDisabilitas->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="anak_id">Nama Anak</label>
                <input type="text" class="form-control" name="anak_id"
                    value="{{ old('anak_id', $jenisAnakDisabilitas->anak->nama_lengkap) }}" disabled>
            </div>


            <div class="form-group">
                <label for="kategori_anak_disabilitas">Kategori Anak Disabilitas<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="kategori_anak_disabilitas"
                    value="{{ old('kategori_anak_disabilitas', $jenisAnakDisabilitas->kategori_anak_disabilitas) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="jenis_anak_disabilitas">Jenis Anak Disabilitas<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="jenis_anak_disabilitas"
                    value="{{ old('jenis_anak_disabilitas', $jenisAnakDisabilitas->jenis_anak_disabilitas) }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $jenisAnakDisabilitas->deskripsi) }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
