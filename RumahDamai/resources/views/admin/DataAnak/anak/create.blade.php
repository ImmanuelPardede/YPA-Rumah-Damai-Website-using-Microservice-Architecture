@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Tambah Anak</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        Terdapat kesalahan saat validasi data. Mohon periksa kembali.
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
            @endif
            
            <form action="{{ route('anak.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                </div>
                <div class="form-group">
                    <label for="agama_id">Agama <span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="agama_id" name="agama_id" value="{{ old('agama_id') }}" required>
                        <option value="" disabled selected>-- Pilih Agama --</option>
                        @foreach ($agama as $agamaItem)
                        <option value="{{ $agamaItem->id }}" {{ old('agama_id') == $agamaItem->id ? 'selected' : '' }}>{{ $agamaItem->agama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin_id">Jenis Kelamin <span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="jenis_kelamin_id" name="jenis_kelamin_id" required>
                        <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                        @foreach ($jenisKelamin as $jenisKelaminItem)
                            <option value="{{ $jenisKelaminItem->id }}" {{ old('jenis_kelamin_id') == $jenisKelaminItem->id ? 'selected' : '' }}>{{ $jenisKelaminItem->jenis_kelamin }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="golongan_darah_id">Golongan Darah <span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="golongan_darah_id" name="golongan_darah_id" required>
                        <option value="" disabled>-- Pilih Golongan Darah --</option>
                        @foreach ($golonganDarah as $golonganDarahItem)
                            <option value="{{ $golonganDarahItem->id }}" {{ old('golongan_darah_id') == $golonganDarahItem->id ? 'selected' : '' }}>{{ $golonganDarahItem->golongan_darah }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="tipe_anak">Pilih Tipe Anak <span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="tipe_anak" name="tipe_anak" required>
                        <option value="" {{ old('tipe_anak') == '' ? 'selected' : '' }}>Pilih Tipe Anak</option>
                        <option value="disabilitas" {{ old('tipe_anak') == 'disabilitas' ? 'selected' : '' }}>Disabilitas</option>
                        <option value="non_disabilitas" {{ old('tipe_anak') == 'non_disabilitas' ? 'selected' : '' }}>Non Disabilitas</option>
                    </select>
                </div>
                

                <div class="form-group" id="kebutuhan_disabilitas_id" >
                    <label for="kebutuhan_disabilitas_id">Jenis Kebutuhan Disabilitas</label>
                    <select class="form-control js-example-basic-single" name="kebutuhan_disabilitas_id" value="{{ old('kebutuhan_disabilitas_id') }}">
                        <option value="" disabled selected>-- Pilih Jenis Kebutuhan Disabilitas --</option>
                        @foreach ($kebutuhanDisabilitas as $kebutuhanDisabilitasItem)
                            @if ($kebutuhanDisabilitasItem && $kebutuhanDisabilitasItem->jenis_kebutuhan_disabilitas) <!-- Check if the item and its property are not null -->
                                <option value="{{ $kebutuhanDisabilitasItem->id }}">{{ $kebutuhanDisabilitasItem->jenis_kebutuhan_disabilitas }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir <span style="color: red">*</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir <span style="color: red">*</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat <span style="color: red">*</label>
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                </div>

                <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

                <div class="mb-3">
                    <label for="disukai" class="form-label">Disukai<span style="color: red">*</span></label>
                    <textarea id="editor1" class="form-control @error('disukai') is-invalid @enderror" name="disukai" required autocomplete="disukai">
                        <ul>
                            <li>..</li>
                        </ul>
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
                        <ul>
                            <li>..</li>
                        </ul>
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
                        <ul>
                            <li>..</li>
                        </ul>
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
                        <ul>
                            <li>..</li>
                        </ul>
                        {{ old('kekurangan') }}
                    </textarea>
                    @error('kekurangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi_id">Tempat Yayasan <span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="lokasi_id" name="lokasi_id" required>
                        <option value="" disabled>-- Pilih Lokasi --</option>
                        @foreach ($lokasiTugas as $lokasi)
                            <option value="{{ $lokasi->id }}" {{ old('lokasi_id') == $lokasi->id ? 'selected' : '' }}>{{ $lokasi->lokasi }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="foto_profil">Foto Profil:</label>
                    <input type="file" class="form-control" name="foto_profil" value="{{ old('foto_profil') }}">
                    <small class="text-muted">Jenis file yang diizinkan: JPG, JPEG, PNG.</small>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Anda perlu menyertakan jQuery -->

        <script type="text/javascript">
            $(document).ready(function () {
                // Sembunyikan field "Jenis Kebutuhan Disabilitas" saat halaman pertama dimuat
                $('#kebutuhan_disabilitas_id').hide();

                // Tambahkan event listener untuk memantau perubahan pada field "Pilih Tipe Anak"
                $('#tipe_anak').change(function () {
                    var selectedValue = $(this).val();

                    // Jika nilai yang dipilih adalah "disabilitas", maka tampilkan field "Jenis Kebutuhan Disabilitas"
                    if (selectedValue === 'disabilitas') {
                        $('#kebutuhan_disabilitas_id').show();
                    } else {
                        // Jika nilai yang dipilih bukan "disabilitas", maka sembunyikan field "Jenis Kebutuhan Disabilitas"
                        $('#kebutuhan_disabilitas_id').hide();
                    }
                });
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
