@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Jenis Golongan Darah</h2>

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

        <form action="{{ route('golonganDarah.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="golongan_darah">Nama Golongan Darah</label>
                <input type="text" class="form-control" name="golongan_darah" value="{{ old('golongan_darah') }}" required>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
