@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Jenis Donasi</h2>

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

        <form action="{{ route('donasi.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="donasi">Jenis Donasi<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="donasi" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi<span style="color: red">*</span></label>
                <textarea class="form-control" name="deskripsi" required></textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
