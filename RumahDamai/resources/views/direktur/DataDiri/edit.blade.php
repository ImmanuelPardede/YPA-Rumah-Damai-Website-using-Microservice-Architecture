@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Edit Profil Anda</h1>
                <div class="row">
                    <div class="col-8">
                <form action="{{ route('direktur.DataDiri.update', ['user' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                            value="{{ $user->nama_lengkap }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP:</label>
                        <input type="text" name="nip" id="nip" class="form-control"
                            value="{{ $user->nip }}">
                    </div>

                    <div class="form-group">
                        <label for="golongan_darah_id">Golongan Darah <span style="color: red">*</label>
                        <select class="form-control js-example-basic-single" id="golongan_darah_id"
                            name="golongan_darah_id">
                            <option value="" disabled selected>-- Pilih Golongan Darah Anda --</option>
                            @foreach ($golongandarah as $darahlist)
                                <option value="{{ $darahlist->id }}"
                                    {{ $user->golongan_darah_id == $darahlist->id ? 'selected' : '' }}>
                                    {{ $darahlist->golongan_darah }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin_id">Jenis Kelamin <span style="color: red">*</label>
                        <select class="form-control js-example-basic-single" id="jenis_kelamin_id" name="jenis_kelamin_id">
                            <option value="" disabled selected>-- Pilih Jenis Kelamin Anda --</option>
                            @foreach ($jeniskelamin as $kelaminlist)
                                <option value="{{ $kelaminlist->id }}"
                                    {{ $user->jenis_kelamin_id == $kelaminlist->id ? 'selected' : '' }}>
                                    {{ $kelaminlist->jenis_kelamin }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agama_id">Agama <span style="color: red">*</label>
                        <select class="form-control js-example-basic-single" id="agama_id" name="agama_id">
                            <option value="" disabled selected>-- Pilih Agama Anda --</option>
                            @foreach ($agama as $agamalist)
                                <option value="{{ $agamalist->id }}"
                                    {{ $user->agama_id == $agamalist->id ? 'selected' : '' }}>
                                    {{ $agamalist->agama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pendidikan_id">Pendidikan <span style="color: red">*</label>
                        <select class="form-control js-example-basic-single" id="pendidikan_id" name="pendidikan_id">
                            <option value="" disabled selected>-- Pilih Pendidikan Anda --</option>
                            @foreach ($pendidikan as $pendidikanlist)
                                <option value="{{ $pendidikanlist->id }}"
                                    {{ $user->pendidikan_id == $pendidikanlist->id ? 'selected' : '' }}>
                                    {{ $pendidikanlist->tingkat_pendidikan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat <span style="color: red">*</label>
                        <input type="text" name="alamat" id="alamat" class="form-control"
                            value="{{ $user->alamat }}">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="tel" name="no_telepon" id="no_telepon" class="form-control"
                            value="{{ $user->no_telepon }}">
                    </div>
                    <div class="form-group">
                        <label for="lulusan">Lulusan</label>
                        <input type="text" name="lulusan" id="lulusan" class="form-control"
                            value="{{ $user->lulusan }}">
                    </div>




                    
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <div class="mb-3">
        <label for="pengalaman" class="form-label">pengalaman</label>
        <textarea id="editor1" class="form-control @error('pengalaman') is-invalid @enderror" name="pengalaman" required autocomplete="pengalaman">
            {{ old('pengalaman') }}
            {{ $user->pengalaman }}
        </textarea>
        @error('pengalaman')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            value="{{ $user->tempat_lahir }}">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir <span style="color: red">*</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            value="{{ $user->tanggal_lahir }}">
                    </div>
                    

                    


                    <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                        onclick="handleUpdatedConfirmation(event)">Perbarui</button>
                    </div>
                    <div class="col-4">
                        <div class="image-frame">
                            @if ($user->foto)
                                <img src="{{ asset('uploads/pegawai/' . $user->foto) }}" alt="Foto Profil user"
                                    class="img-fluid rounded">
                            @else
                                <p>Tidak ada foto profil.</p>
                            @endif
                            <div class="form-group">
                                <label for="foto">Foto Profil Baru?</label>
                                <input type="file" name="foto" class="file-upload-default" id="fotoInput">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" id="fotoName" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button"
                                            onclick="document.getElementById('fotoInput').click()">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('fotoInput').addEventListener('change', function() {
            var fullPath = this.value;
            var fileName = fullPath.split('\\').pop();
            document.getElementById('fotoName').value = fileName;
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor1'), {
                // Konfigurasi CKEditor 5 untuk textarea pertama
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });
    });
</script>

@endsection
