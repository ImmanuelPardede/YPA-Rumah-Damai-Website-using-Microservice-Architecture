@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Semester Tahun Ajaran</h2>

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

        <form action="{{ route('semesterTahunAjaran.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="semester_tahun_ajaran">Tahun Ajaran</label>
                <input type="text" class="form-control" name="semester_tahun_ajaran" value="{{ old('semester_tahun_ajaran') }}" min="1900" max="9999">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
