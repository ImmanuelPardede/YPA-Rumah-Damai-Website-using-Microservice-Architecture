@extends('layouts.management.master')

@section('content')
<div class="container">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Edit Program</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('program.update', $program->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Input untuk gambar program -->
                        <div class="form-group">
                            <label for="img_program">Gambar Program</label>
                            <input type="file" class="form-control @error('img_program') is-invalid @enderror" id="img_program" name="img_program">
                            <img src="{{ asset($program->img_program) }}" alt="Program Image" style="max-width: 200px; margin-top: 10px;">
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
                                {{ $program->kelas }}
                                {{ old('kelas') }}
                            </textarea>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <!-- Input untuk jenis program dan deskripsi -->
                        <div class="program-details">
                            @foreach ($detailPrograms as $detail)
                            <div class="form-group">
                                <label for="jenis_program">Jenis Program</label>
                                <input type="text" class="form-control @error('jenis_program[]') is-invalid @enderror" name="jenis_program[]" value="{{ $detail->jenis_program }}" required>
                                @error('jenis_program.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi[]') is-invalid @enderror" name="deskripsi[]" rows="4" required>{{ $detail->deskripsi }}</textarea>
                                @error('deskripsi.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endforeach
                        </div>

                        <!-- Tombol Tambah Detail -->
                        <a href="#" class="addprogram btn btn-primary" style="float: right">Tambah Detail</a>

                        <!-- Container untuk menambahkan detail program dinamis -->
                        <div class="raport"></div>

                        <!-- Tombol Simpan -->
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

    // Fungsi untuk menambahkan detail program
    function addprogram() {
        var programDetail =
            '<div class="form-group"><label for="jenis_program">Jenis Program</label><input type="text" class="form-control @error('jenis_program[]') is-invalid @enderror" name="jenis_program[]" required></div><div class="form-group"><label for="deskripsi">Deskripsi</label><textarea class="form-control @error('deskripsi[]') is-invalid @enderror" name="deskripsi[]" rows="4" required></textarea><a href="#" class="remove btn btn-danger" style="float: right">Hapus</a></div>';
        $('.raport').append(programDetail);
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
                // Konfigurasi CKEditor 5 untuk textarea
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });
    });
</script>
@endsection
