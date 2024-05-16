@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Kategori Berita</h2>

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

        <form action="{{ route('kategoriBerita.update', $categories['ID']) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Kategori Berita</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $categories['name']) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
