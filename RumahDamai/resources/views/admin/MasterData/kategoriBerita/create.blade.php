@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Kategori Berita</h2>

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

        <form action="{{ route('kategoriBerita.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nama  Berita</label>
                <input type="text" class="form-control" name="name">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
