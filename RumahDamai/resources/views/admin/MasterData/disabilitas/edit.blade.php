@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Disabilitas</h2>

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

        <form action="{{ route('disabilitas.update', $jenis_disabilitas['ID']) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kategori_disabilitas">Kategori Disabilitas:</label>
                <input type="text" class="form-control" name="kategori_disabilitas"
                    value="{{ $jenis_disabilitas['kategori_disabilitas'] }}">
            </div>

            <div class="form-group">
                <label for="jenis_disabilitas">Jenis Disabilitas:</label>
                <input type="text" class="form-control" name="jenis_disabilitas"
                    value="{{ $jenis_disabilitas['jenis_disabilitas'] }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi">{{ $jenis_disabilitas['deskripsi'] }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Perbarui</button>
        </form>
    </div>
@endsection
