@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Lokasi Penugasan</h2>

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

        <form action="{{ route('lokasiTugas.update', $lokasiPenugasan->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="wilayah">Wilayah</label>
                <input type="text" class="form-control" name="wilayah"
                    value="{{ old('wilayah', $lokasiPenugasan->wilayah) }}">
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" name="lokasi"
                    value="{{ old('lokasi', $lokasiPenugasan->lokasi) }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $lokasiPenugasan->deskripsi) }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
