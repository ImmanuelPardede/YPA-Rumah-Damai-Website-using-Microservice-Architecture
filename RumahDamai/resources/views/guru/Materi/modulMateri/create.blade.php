@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tambah Modul Materi</h2>
                <form action="{{ route('modulMateri.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kelas_id">Nama Kelas<span style="color: red">*</span></label>
                        <select class="form-control js-example-basic-single" id="kelas_id" name="kelas_id" required>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_materi">Nama Materi<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="nama_materi" name="nama_materi" required>
                    </div>

                    <div class="form-group">
                        <label for="minggu_pembelajaran_id">Minggu Pembelajaran<span style="color: red">*</span></label>
                        <select class="form-control js-example-basic-single" id="minggu_pembelajaran_id"
                            name="minggu_pembelajaran_id" required>
                            @foreach ($mingguPembelajaran as $mingguPembelajaranItem)
                                <option value="{{ $mingguPembelajaranItem->id }}">
                                    {{ $mingguPembelajaranItem->minggu_pembelajaran }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file_modul">File Modul<span style="color: red">*</span></label>
                        <input type="file" class="form-control" name="file_modul" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
