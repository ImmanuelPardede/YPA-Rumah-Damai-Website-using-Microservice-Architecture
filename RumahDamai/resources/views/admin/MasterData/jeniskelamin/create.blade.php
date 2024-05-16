@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Kelamin</h2>

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

        <form action="{{ route('jenisKelamin.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="jenis_kelamin">Nama Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
