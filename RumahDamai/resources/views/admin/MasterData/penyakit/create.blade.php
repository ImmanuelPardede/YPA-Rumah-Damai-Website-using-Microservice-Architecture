@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Jenis Penyakit</h2>

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

        <form action="{{ route('penyakit.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="jenis_penyakit">Jenis Penyakit<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="jenis_penyakit" value="{{ old('jenis_penyakit') }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi<span style="color: red">*</span></label>
                <textarea class="form-control" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
