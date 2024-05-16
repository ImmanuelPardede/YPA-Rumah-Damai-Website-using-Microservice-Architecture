@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Tahun Ajaran</h2>

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

        <form action="{{ route('tahunAjaran.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran</label>
                <input type="year" class="form-control" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}" min="1900" max="9999">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
