@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Buat Pengumuman</h2>
                <form method="POST" action="{{ route('admin.pengumuman.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="judul">Judul<span style="color: red">*</span></label>
                        <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                            name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>

                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi<span style="color: red">*</span></label>
                        <textarea id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required
                            autocomplete="deskripsi">Dear Pegawai, {{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori<span style="color: red">*</span></label>
                        <select id="kategori"
                            class="js-example-basic-single form-control @error('kategori') is-invalid @enderror"
                            name="kategori" required autocomplete="kategori">
                            <option value="">Pilih Kategori</option>
                            <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Administratif" {{ old('kategori') == 'Administratif' ? 'selected' : '' }}>
                                Administratif</option>
                            <option value="Kesehatan dan Keselamatan"
                                {{ old('kategori') == 'Kesehatan dan Keselamatan' ? 'selected' : '' }}>Kesehatan dan
                                Keselamatan</option>
                            <option value="Acara dan Kegiatan"
                                {{ old('kategori') == 'Acara dan Kegiatan' ? 'selected' : '' }}>Acara dan Kegiatan</option>
                            <option value="Penghargaan dan Prestasi"
                                {{ old('kategori') == 'Penghargaan dan Prestasi' ? 'selected' : '' }}>Penghargaan dan
                                Prestasi</option>
                            <option value="Sistem" {{ old('kategori') == 'Sistem' ? 'selected' : '' }}>Sistem</option>
                            <option value="Pelayanan Pelanggan"
                                {{ old('kategori') == 'Pelayanan Pelanggan' ? 'selected' : '' }}>Pelayanan Pelanggan
                            </option>
                            <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                            <option value="Keuangan" {{ old('kategori') == 'Keuangan' ? 'selected' : '' }}>Keuangan
                            </option>
                        </select>

                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Buat Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection


