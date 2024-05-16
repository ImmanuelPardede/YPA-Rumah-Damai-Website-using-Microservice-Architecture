@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Anak Disabilitas</h2>

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

        <form action="{{ route('anakDisabilitas.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="kategori_anak_disabilitas">Kategori Anak Disabilitas<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="kategori_anak_disabilitas" value="{{ old('kategori_anak_disabilitas') }}">
            </div>

            <div class="form-group">
                <label for="jenis_anak_disabilitas">Jenis Anak Disabilitas<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="jenis_anak_disabilitas" value="{{ old('jenis_anak_disabilitas') }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
