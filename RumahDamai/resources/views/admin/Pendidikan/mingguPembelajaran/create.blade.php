@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Minggu Pembelajaran</h2>

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

        <form action="{{ route('mingguPembelajaran.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="minggu_pembelajaran">Minggu Pembelajaran<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="minggu_pembelajaran" value="{{ old('minggu_pembelajaran') }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai<span style="color: red">*</span></label>
                <input type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir<span style="color: red">*</span></label>
                <input type="date" class="form-control" name="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}" required>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
