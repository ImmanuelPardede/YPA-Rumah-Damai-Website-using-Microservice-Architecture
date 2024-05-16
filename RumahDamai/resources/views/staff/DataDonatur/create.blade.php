@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Data Donatur</h2>
        <form action="{{ route('dataDonatur.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="donasi_id">Jenis Donasi<span style="color: red">*</span></label>
                <select class="form-control js-example-basic-single" id="donasi_id" name="donasi_id[]" multiple required>
                    @foreach ($donasi as $donasiItem)
                        <option value="{{ $donasiItem->id }}">{{ $donasiItem->jenis_donasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_donatur">Nama Donatur<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" required>
            </div>
            <div class="form-group">
                <label for="email_donatur">Email Donatur<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="email_donatur" name="email_donatur" required>
            </div>
            <div class="form-group">
                <label for="tanggal_donatur">Tanggal Donasi<span style="color: red">*</span></label>
                <input type="date" class="form-control" id="tanggal_donatur" name="tanggal_donatur" required>
            </div>
            <div class="form-group">
                <label for="no_hp_donatur">No. Hp Donatur<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="no_hp_donatur" name="no_hp_donatur" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>
            <div class="form-group">
                <label for="jumlah_donasi">Jumlah Donasi<span style="color: red">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="height: 86%;">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" required>
                </div>
            </div>

            <div class="form-group">
                <label for="foto_donatur">Foto Donatur<span style="color: red">*</span></label>
                <input type="file" class="form-control" name="foto_donatur" required>
                <small class="text-muted">Jenis file yang diizinkan: JPG, JPEG, PNG.</small>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
