@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Kelas</h2>

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

        <form action="{{ route('kelas.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="nama_kelas">Nama Kelas<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="nama_kelas" value="{{ old('nama_kelas') }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_kurikulum_id">Tahun Kurikulum<span style="color: red">*</span></label>
                <select class="form-control" id="tahun_kurikulum_id" name="tahun_kurikulum_id" required>
                    <option value="" disabled selected>-- Pilih Tahun Kurikulum --</option>
                    @foreach ($tahunKurikulum as $item)
                        <option value="{{ $item->id }}">{{ $item->tahun_kurikulum }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tahun_ajaran_id">Tahun Ajaran <span style="color: red">*</span></label>
                <select class="form-control" id="tahun_ajaran_id" name="tahun_ajaran_id" required>
                    <option value="" disabled selected>-- Pilih Tahun Ajaran --</option>
                    @foreach ($tahunAjaran as $item)
                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="semester_tahun_ajaran_id">Semester Tahun Ajaran <span style="color: red">*</span></label>
                <select class="form-control" id="semester_tahun_ajaran_id" name="semester_tahun_ajaran_id" required>
                    <option value="" disabled selected>-- Pilih Semester Tahun Ajaran --</option>
                    @foreach ($semesterTahunAjaran as $item)
                        <option value="{{ $item->id }}">{{ $item->semester_tahun_ajaran }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>

    </div>
@endsection
