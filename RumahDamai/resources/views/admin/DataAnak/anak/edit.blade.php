@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Anak</h2>

<div class="row">
                <div class="col-md-8">

                <form action="{{ route('anak.update', $anak->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $anak->nama_lengkap }}" required>
                    </div>

                    <div class="form-group">
                        <label for="agama_id">Agama:</label>
                        <select class="form-control" id="agama_id" name="agama_id" required>
                            <option value="" disabled>-- Pilih Agama --</option>
                            @foreach ($agama as $agamalist)
                                <option value="{{ $agamalist->id }}"
                                    {{ $anak->agama_id == $agamalist->id ? 'selected' : '' }}>
                                    {{ $agamalist->agama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin_id">Jenis Kelamin:</label>
                        <select class="form-control" id="jenis_kelamin_id" name="jenis_kelamin_id" required>
                            <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                            @foreach ($jenisKelamin as $kelaminlist)
                                <option value="{{ $kelaminlist->id }}"
                                    {{ $anak->jenis_kelamin_id == $kelaminlist->id ? 'selected' : '' }}>
                                    {{ $kelaminlist->jenis_kelamin }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="golongan_darah_id">Golongan Darah:</label>
                        <select class="form-control" id="golongan_darah_id" name="golongan_darah_id" required>
                            <option value="" disabled>-- Pilih Golongan Darah --</option>
                            @foreach ($golonganDarah as $darahlist)
                                <option value="{{ $darahlist->id }}"
                                    {{ $anak->golongan_darah_id == $darahlist->id ? 'selected' : '' }}>
                                    {{ $darahlist->golongan_darah }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kebutuhan_disabilitas_id">Kebutuhan Disabilitas:</label>
                        <select class="form-control" id="kebutuhan_disabilitas_id" name="kebutuhan_disabilitas_id" required>
                            <option value="" disabled>-- Pilih Kebutuhan Disabilitas --</option>
                            @foreach ($kebutuhanDisabilitas as $kebutuhanDisabilitaslist)
                                <option value="{{ $kebutuhanDisabilitaslist->id }}"
                                    {{ $anak->kebutuhan_disabilitas_id == $kebutuhanDisabilitaslist->id ? 'selected' : '' }}>
                                    {{ $kebutuhanDisabilitaslist->jenis_kebutuhan_disabilitas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tipe_anak">Jenis Anak:</label>
                        <select class="form-control" id="tipe_anak" name="tipe_anak" required>
                            <option value="" disabled>-- Pilih Jenis Anak --</option>
                            <option value="disabilitas" @if ($anak->tipe_anak == 'disabilitas') selected @endif>Disabilitas
                            </option>
                            <option value="non_disabilitas" @if ($anak->tipe_anak == 'non_disabilitas') selected @endif>Non
                                Disabilitas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ $anak->tempat_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $anak->tanggal_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $anak->alamat }}</textarea>
                    </div>

                    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

                <div class="mb-3">
                    <label for="disukai" class="form-label">Disukai<span style="color: red">*</span></label>
                    <textarea id="editor1" class="form-control @error('disukai') is-invalid @enderror" name="disukai" required autocomplete="disukai">
                        {{ $anak->disukai }}
                        {{ old('disukai') }}
                    </textarea>
                    @error('disukai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tidak_disukai" class="form-label">Tidak Disukai<span style="color: red">*</span></label>
                    <textarea id="editor2" class="form-control @error('tidak_disukai') is-invalid @enderror" name="tidak_disukai" required autocomplete="tidak_disukai">
                        {{ $anak->tidak_disukai }}
                        {{ old('tidak_disukai') }}
                    </textarea>
                    @error('tidak_disukai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kelebihan" class="form-label">Kelebihan<span style="color: red">*</span></label>
                    <textarea id="editor3" class="form-control @error('kelebihan') is-invalid @enderror" name="kelebihan" required autocomplete="kelebihan">
                        {{ $anak->kelebihan }}
                        {{ old('kelebihan') }}
                    </textarea>
                    @error('kelebihan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kekurangan" class="form-label">Kekurangan<span style="color: red">*</span></label>
                    <textarea id="editor4" class="form-control @error('kekurangan') is-invalid @enderror" name="kekurangan" required autocomplete="kekurangan">
                        {{ $anak->kekurangan }}
                        {{ old('kekurangan') }}
                    </textarea>
                    @error('kekurangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                    
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
                    <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                        onclick="handleUpdatedConfirmation(event)">Perbarui</button>
                </div>
                <div class="col-md-4">
                    <div class="image-frame">
                        @if ($anak->foto_profil)
                            <img src="{{ asset($anak->foto_profil) }}" class="img-fluid" alt="Foto Profil">
                        @else
                            <p>Tidak ada foto profil.</p>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="foto_profil">Foto Profil Baru:</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                            </div>
                        </div>
                        
    
                </div>
            </form>

            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#editor1'), {
                    // Konfigurasi CKEditor 5 untuk textarea pertama
                })
                .catch(error => {
                    console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
                });
    
            ClassicEditor
                .create(document.querySelector('#editor2'), {
                    // Konfigurasi CKEditor 5 untuk textarea kedua
                })
                .catch(error => {
                    console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
                });
    
                ClassicEditor
                .create(document.querySelector('#editor3'), {
                    // Konfigurasi CKEditor 5 untuk textarea kedua
                })
                .catch(error => {
                    console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
                });
    
                ClassicEditor
                .create(document.querySelector('#editor4'), {
                    // Konfigurasi CKEditor 5 untuk textarea kedua
                })
                .catch(error => {
                    console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
                });
        });
    </script>

@endsection
