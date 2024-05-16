@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="card-title">Tambah Program Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('program.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="img_program">Gambar Program</label>
                            <input type="file" class="form-control @error('img_program') is-invalid @enderror" id="img_program" name="img_program" required>
                            @error('img_program')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas<span style="color: red">*</span></label>
                            <textarea id="editor1" class="form-control @error('kelas') is-invalid @enderror" name="kelas" required autocomplete="kelas">
                                <ul>
                                    <li>..</li>
                                </ul>
                                {{ old('kelas') }}
                            </textarea>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_program">Jenis Program</label>
                            <input type="text" class="form-control @error('jenis_program[]') is-invalid @enderror" id="jenis_program" name="jenis_program[]" required>
                            @error('jenis_program[]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi[]') is-invalid @enderror" id="deskripsi" name="deskripsi[]" rows="4" required></textarea>
                            @error('deskripsi[]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <a href="#" class="addprogram btn btn-primary" style="float: right">Tambah Detail</a>
                        <div class="raport"></div>
            

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        // Event listener untuk tombol "Tambah Detail"
        $('.addprogram').on('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link
            addprogram();
        });

        // Fungsi untuk menambahkan detail raport
        function addprogram() {
            var raport =
                '<div><div class="form-group"><label for="jenis_program">Jenis Program</label><input type="text" class="form-control @error('jenis_program[]') is-invalid @enderror" id="jenis_program" name="jenis_program[]" required></div><div class="form-group"><label for="deskripsi">Deskripsi</label><textarea class="form-control @error('deskripsi[]') is-invalid @enderror" id="deskripsi" name="deskripsi[]" rows="4" required></textarea></div><a href="#" class="remove btn btn-danger" style="float: right">Hapus</a></div>';
            $('.raport').append(raport);
        };

        // Event listener untuk tombol "Hapus"
        $(document).on('click', '.remove', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link
            $(this).parent().remove();
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


