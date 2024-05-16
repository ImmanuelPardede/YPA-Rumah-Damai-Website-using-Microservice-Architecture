@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Data Orang Tua/Wali</h2>

        <form action="{{ route('orangTuaWali.update', $orangtuawali->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="anak_id">Nama Anak</label>
                <select class="form-control js-example-basic-single" id="anak_id" name="anak_id">
                    <option value="" disabled>-- Anak --</option>
                    @foreach ($anak as $anaklist)
                        <option value="{{ $anaklist->id }}" {{ $orangtuawali->anak_id == $anaklist->id ? 'selected' : '' }}>
                            {{ $anaklist->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="agama_id">Agama</label>
                <select class="form-control js-example-basic-single" id="agama_id" name="agama_id">
                    <option value="" disabled>-- Pilih Agama --</option>
                    @foreach ($agama as $agamalist)
                        <option value="{{ $agamalist->id }}"
                            {{ $orangtuawali->agama_id == $agamalist->id ? 'selected' : '' }}>
                            {{ $agamalist->agama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                    value="{{ $orangtuawali->nama_ibu }}">
            </div>

            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                    value="{{ $orangtuawali->nama_ayah }}">
            </div>

            <div class="form-group">
                <label for="nik_ayah">NIK Ayah</label>
                <input type="text" class="form-control" id="nik_ayah" name="nik_ayah"
                    value="{{ $orangtuawali->nik_ayah }}">
            </div>

            <div class="form-group">
                <label for="nik_ibu">NIK Ibu</label>
                <input type="text" class="form-control" id="nik_ibu" name="nik_ibu"
                    value="{{ $orangtuawali->nik_ibu }}">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                    value="{{ $orangtuawali->tanggal_lahir_ayah }}">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu"
                    value="{{ $orangtuawali->tanggal_lahir_ibu }}">
            </div>

            <div class="form-group">
                <label for="alamat_orangtua">Alamat Orangtua</label>
                <textarea class="form-control" id="alamat_orangtua" name="alamat_orangtua" rows="3">{{ $orangtuawali->alamat_orangtua }}</textarea>
            </div>

            <div class="form-group">
                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                <textarea class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" rows="3">{{ $orangtuawali->pendidikan_ayah }}</textarea>
            </div>

            <div class="form-group">
                <label for="pekerjaan_ayah_id">Pekerjaan Ayah</label>
                <select class="form-control js-example-basic-single" id="pekerjaan_ayah_id" name="pekerjaan_ayah_id">
                    <option value="" disabled>-- Pilih Pekerjaan --</option>
                    @foreach ($pekerjaan as $pekerjaanlist)
                        <option value="{{ $pekerjaanlist->id }}"
                            {{ $orangtuawali->pekerjaan_ayah_id == $pekerjaanlist->id && !old('pekerjaan_ayah_id') ? 'selected' : '' }}>
                            {{ $pekerjaanlist->jenis_pekerjaan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="no_hp_ayah">No. HP Ayah</label>
                <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah"
                    value="{{ $orangtuawali->no_hp_ayah }}">
            </div>

            <div class="form-group">
                <label for="pendidikan_ibu">Pendidikan Ibu</label>
                <textarea class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" rows="3">{{ $orangtuawali->pendidikan_ibu }}</textarea>
            </div>

            <div class="form-group">
                <label for="pekerjaan_ibu_id">Pekerjaan Ibu</label>
                <select class="form-control js-example-basic-single" id="pekerjaan_ibu_id" name="pekerjaan_ibu_id">
                    <option value="" disabled>-- Pilih Pekerjaan --</option>
                    @foreach ($pekerjaan as $pekerjaanlist)
                        <option value="{{ $pekerjaanlist->id }}"
                            {{ $orangtuawali->pekerjaan_ibu_id == $pekerjaanlist->id && !old('pekerjaan_ibu_id') ? 'selected' : '' }}>
                            {{ $pekerjaanlist->jenis_pekerjaan }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="no_hp_ibu">No. HP Ibu</label>
                <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu"
                    value="{{ $orangtuawali->no_hp_ibu }}">
            </div>

            <div class="form-group">
                <label for="nama_wali">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                    value="{{ $orangtuawali->nama_wali }}">
            </div>

            <div class="form-group">
                <label for="alamat_wali">Alamat Wali</label>
                <textarea class="form-control" id="alamat_wali" name="alamat_wali" rows="3">{{ $orangtuawali->alamat_wali }}</textarea>
            </div>

            <div class="form-group">
                <label for="pekerjaan_wali_id">Pekerjaan Wali</label>
                <select class="form-control js-example-basic-single" id="pekerjaan_wali_id" name="pekerjaan_wali_id">
                    <option value="" disabled>-- Pilih Pekerjaan --</option>
                    @foreach ($pekerjaan as $pekerjaanlist)
                        <option value="{{ $pekerjaanlist->id }}"
                            {{ $orangtuawali->pekerjaan_wali_id == $pekerjaanlist->id && !old('pekerjaan_wali_id') ? 'selected' : '' }}>
                            {{ $pekerjaanlist->jenis_pekerjaan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir_wali">Tanggal Lahir Wali</label>
                <input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali"
                    value="{{ $orangtuawali->tanggal_lahir_wali }}">
            </div>

            <div class="form-group">
                <label for="no_hp_wali">No. HP Wali</label>
                <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali"
                    value="{{ $orangtuawali->no_hp_wali }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
