@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Silabus</h2>

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

        <form action="{{ route('silabus.update', $silabus->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tahun_kurikulum_id">Tahun Kurikulum</label>
                <select class="form-control" id="tahun_kurikulum_id" name="tahun_kurikulum_id">
                    @foreach ($tahunKurikulum as $tahun)
                        <option value="{{ $tahun->id }}"
                            {{ $silabus->tahun_kurikulum_id == $tahun->id ? 'selected' : '' }}>{{ $tahun->tahun_kurikulum }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kelas_id">Nama Kelas</label>
                <select class="form-control" id="kelas_id" name="kelas_id">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ $silabus->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $silabus->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="hasil_kursus">Hasil Kursus</label>
                <textarea class="form-control" name="hasil_kursus">{{ old('hasil_kursus', $silabus->hasil_kursus) }}</textarea>
            </div>

            <div class="form-group">
                <label for="tipe_pembelajaran">Tipe Pembelajaran</label>
                <textarea class="form-control" name="tipe_pembelajaran">{{ old('tipe_pembelajaran', $silabus->tipe_pembelajaran) }}</textarea>
            </div>

            <div class="form-group">
                <label for="penilaian">Penilaian</label>
                <textarea class="form-control" name="penilaian">{{ old('penilaian', $silabus->penilaian) }}</textarea>
            </div>

            <div class="form-group">
                <label for="konten_kursus">Konten Kursus</label>
                <textarea class="form-control" name="konten_kursus">{{ old('konten_kursus', $silabus->konten_kursus) }}</textarea>
            </div>

            <div class="form-group">
                <label for="buku_pegangan_dan_referensi">Buku Pegangan Dan Referensi</label>
                <textarea class="form-control" name="buku_pegangan_dan_referensi">{{ old('buku_pegangan_dan_referensi', $silabus->buku_pegangan_dan_referensi) }}</textarea>
            </div>

            <div class="form-group">
                <label for="alat">Alat</label>
                <textarea class="form-control" name="alat">{{ old('alat', $silabus->alat) }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
