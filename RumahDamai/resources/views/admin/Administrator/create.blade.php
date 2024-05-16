@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Tambah Akun</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.administrator.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap <span style="color: red">*</span></label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span style="color: red">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span style="color: red">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="role">Role <span style="color: red">*</span></label>
                        <select class="form-control js-example-basic-single" name="role" id="role" required>
                            <option value="" disabled selected>-- Pilih Role Pekerjaan --</option>
                            <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="guru" {{ request('role') === 'guru' ? 'selected' : '' }}>Guru</option>
                            <option value="staff" {{ request('role') === 'staff' ? 'selected' : '' }}>Staff</option>
                            <option value="direktur" {{ request('role') === 'direktur' ? 'selected' : '' }}>Direktur</option>
                        </select>
                    </div>

                    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label">pengalaman<span style="color: red">*</span></label>
                        <textarea id="editor1" class="form-control @error('pengalaman') is-invalid @enderror" name="pengalaman" required autocomplete="pengalaman">
                            {{ old('pengalaman') }}
                            <ul>
                                <li></li>
                            </ul>
                        </textarea>
                        @error('pengalaman')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="tel" name="no_telepon" id="no_telepon" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="lokasi_penugasan_id">Lokasi Penugasan <span style="color: red">*</span></label>
                        <select class="form-control js-example-basic-single" id="lokasi_penugasan_id"
                            name="lokasi_penugasan_id" required>
                            <option value="" disabled selected>-- Pilih Lokasi Penugasan --</option>
                            @foreach ($lokasi as $lokasilist)
                                <option value="{{ $lokasilist->id }}">{{ $lokasilist->lokasi }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
    });
</script>
    
@endsection
