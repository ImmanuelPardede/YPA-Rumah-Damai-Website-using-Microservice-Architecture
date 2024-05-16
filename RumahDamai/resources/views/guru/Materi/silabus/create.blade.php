@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tambah Silabus</h2>
                <form action="{{ route('silabus.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tahun_kurikulum_id">Tahun Kurikulum<span style="color: red">*</span></label>
                        <select class="form-control" id="tahun_kurikulum_id" name="tahun_kurikulum_id" required>
                            @foreach ($tahunKurikulum as $tahunKurikulumItem)
                                <option value="{{ $tahunKurikulumItem->id }}">{{ $tahunKurikulumItem->tahun_kurikulum }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kelas_id">Nama Kelas<span style="color: red">*</span></label>
                        <select class="form-control" id="kelas_id" name="kelas_id" required>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="hasil_kursus">Hasil Kursus</label>
                        <input type="text" class="form-control" id="hasil_kursus" name="hasil_kursus">
                    </div>

                    <div class="form-group">
                        <label for="tipe_pembelajaran">Tipe Pembelajaran</label>
                        <textarea class="form-control" id="tipe_pembelajaran" name="tipe_pembelajaran">{{ old('tipe_pembelajaran') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="penilaian">Penilaian</label>
                        <input type="text" class="form-control" id="penilaian" name="penilaian">
                    </div>

                    <div class="form-group">
                        <label for="konten_kursus">Konten Kursus</label>
                        <textarea class="form-control" id="konten_kursus" name="konten_kursus">{{ old('konten_kursus') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="buku_pegangan_dan_referensi">Buku Pegangan Dan Referensi</label>
                        <input type="text" class="form-control" id="buku_pegangan_dan_referensi"
                            name="buku_pegangan_dan_referensi">
                    </div>

                    <div class="form-group">
                        <label for="alat">Alat</label>
                        <textarea class="form-control" id="alat" name="alat">{{ old('alat') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
