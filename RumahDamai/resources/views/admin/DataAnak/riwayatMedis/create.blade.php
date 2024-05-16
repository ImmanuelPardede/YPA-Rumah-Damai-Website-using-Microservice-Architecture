@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Tambah Riwayat Medis</h2>

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

        <form action="{{ route('riwayatMedis.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="anak_id">Nama Anak <span style="color: red">*</span></label>
                <select class="form-control js-example-basic-single" id="anak_id" name="anak_id" required>
                    <option value="" disabled selected>-- Nama Anak --</option>
                    @foreach ($anak as $anakItem)
                        <option value="{{ $anakItem->id }}" {{ old('anak_id') == $anakItem->id ? 'selected' : '' }}>
                            {{ $anakItem->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="penyakit_id">Jenis Penyakit <span style="color: red">*</span></label>
                <select class="form-control js-example-basic-single" id="penyakit_id" name="penyakit_id" required>
                    <option value="" disabled selected>-- Pilih Jenis Penyakit --</option>
                    @foreach ($penyakit as $penyakitList)
                        <option value="{{ $penyakitList->id }}">{{ $penyakitList->jenis_penyakit }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="riwayat_perawatan">Riwayat Medis</label>
                <input type="text" class="form-control" name="riwayat_perawatan" value="{{ old('riwayat_perawatan') }}">
            </div>

            <div class="form-group">
                <label for="riwayat_perilaku">Riwayat Perilaku</label>
                <textarea class="form-control" name="riwayat_perilaku" required>{{ old('riwayat_perilaku') }}</textarea>
            </div>

            <div class="form-group">
                <label for="deskripsi_riwayat">Deskripsi Riwayat:</label>
                <input type="text" class="form-control" name="deskripsi_riwayat" value="{{ old('deskripsi_riwayat') }}" >
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi <span style="color: red">*</span></label>
                <textarea class="form-control" name="kondisi" required>{{ old('kondisi') }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
