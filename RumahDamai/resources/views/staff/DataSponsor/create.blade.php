@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Data Sponsor</h2>
        <form action="{{ route('dataSponsor.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sponsorship_id">Jenis Sponsorship<span style="color: red">*</span></label>
                <select class="form-control js-example-basic-single" id="sponsorship_id" name="sponsorship_id[]" multiple required>
                    @foreach ($sponsorship as $sponsorshipItem)
                        <option value="{{ $sponsorshipItem->id }}">{{ $sponsorshipItem->jenis_sponsorship }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_sponsor">Nama Sponsor<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor" required>
            </div>
            <div class="form-group">
                <label for="email_sponsor">Email Sponsor<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="email_sponsor" name="email_sponsor" required>
            </div>
            <div class="form-group">
                <label for="tanggal_sponsor">Tanggal Sponsor<span style="color: red">*</span></label>
                <input type="date" class="form-control" id="tanggal_sponsor" name="tanggal_sponsor" required>
            </div>
            <div class="form-group">
                <label for="no_telepon_sponsor">No. Hp Sponsor<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="no_telepon_sponsor" name="no_telepon_sponsor" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>
            <div class="form-group">
                <label for="jumlah_sponsor">Jumlah sponsorship<span style="color: red">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="height: 86%;">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="jumlah_sponsor" name="jumlah_sponsor" required>
                </div>
            </div>

            <div class="form-group">
                <label for="foto_sponsor">Foto Sponsor<span style="color: red">*</span></label>
                <input type="file" class="form-control" name="foto_sponsor" required>
                <small class="text-muted">Jenis file yang diizinkan: JPG, JPEG, PNG.</small>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
