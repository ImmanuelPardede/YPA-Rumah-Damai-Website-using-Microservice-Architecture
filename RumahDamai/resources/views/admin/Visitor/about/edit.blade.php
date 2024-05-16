@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit About</h1>

            <!-- Form untuk mengupdate About -->
            <form method="POST" action="{{ route('about.update', $abouts->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Input untuk latar belakang -->
                <div class="mb-3">
                    <label for="latar_belakang" class="form-label">Latar Belakang</label>
                    <textarea class="form-control" id="latar_belakang" name="latar_belakang" rows="5">{{ $abouts->latar_belakang }}</textarea>
                </div>

                <!-- Input untuk visi -->
                <div class="mb-3">
                    <label for="visi" class="form-label">Visi</label>
                    <textarea class="form-control" id="visi" name="visi" rows="5">{{ $abouts->visi }}</textarea>
                </div>

                <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
                <div class="form-group">
                    <label for="misi" class="form-label">Misi<span style="color: red">*</span></label>
                    <textarea id="editor1" class="form-control @error('misi') is-invalid @enderror" name="misi" required autocomplete="misi">
                        {{ $abouts->misi }}
                        {{ old('misi') }}
                    </textarea>
                    @error('misi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Input for misi -->


                <!-- Input untuk wilayah 1 -->
                <div class="mb-3">
                    <label for="wilayah1" class="form-label">Wilayah 1</label>
                    <input type="text" class="form-control" id="wilayah1" name="wilayah1" value="{{ $abouts->wilayah1 }}">
                </div>

                <!-- Input untuk wilayah 2 -->
                <div class="mb-3">
                    <label for="wilayah2" class="form-label">Wilayah 2</label>
                    <input type="text" class="form-control" id="wilayah2" name="wilayah2" value="{{ $abouts->wilayah2 }}">
                </div>

                <!-- Input untuk gambar Yayasan -->
                <div class="mb-3">
                    <label for="img_yayasan" class="form-label">New Yayasan Image</label>
                    <input type="file" class="form-control" id="img_yayasan" name="img_yayasan" accept="image/*">
                </div>

                <!-- Tampilkan gambar yayasan saat ini -->
                @if ($abouts->img_yayasan)
                    <div class="mb-3">
                        <label for="current_img_yayasan" class="form-label">Current Yayasan Image</label>
                        <img src="{{ asset($abouts->img_yayasan) }}" alt="Current Yayasan Image" style="max-width: 300px;">
                    </div>
                @endif

                <!-- Input untuk gambar Wilayah 1 -->
                <div class="mb-3">
                    <label for="img_wilayah1" class="form-label">New Wilayah 1 Image</label>
                    <input type="file" class="form-control" id="img_wilayah1" name="img_wilayah1" accept="image/*">
                </div>

                <!-- Tampilkan gambar wilayah 1 saat ini -->
                @if ($abouts->img_wilayah1)
                    <div class="mb-3">
                        <label for="current_img_wilayah1" class="form-label">Current Wilayah 1 Image</label>
                        <img src="{{ asset($abouts->img_wilayah1) }}" alt="Current Wilayah 1 Image" style="max-width: 300px;">
                    </div>
                @endif

                <!-- Input untuk gambar Wilayah 2 -->
                <div class="mb-3">
                    <label for="img_wilayah2" class="form-label">New Wilayah 2 Image</label>
                    <input type="file" class="form-control" id="img_wilayah2" name="img_wilayah2" accept="image/*">
                </div>

                <!-- Tampilkan gambar wilayah 2 saat ini -->
                @if ($abouts->img_wilayah2)
                    <div class="mb-3">
                        <label for="current_img_wilayah2" class="form-label">Current Wilayah 2 Image</label>
                        <img src="{{ asset($abouts->img_wilayah2) }}" alt="Current Wilayah 2 Image" style="max-width: 300px;">
                    </div>
                @endif

                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary">Update About</button>
            </form>
        </div>
    </div>
</div>
@endsection


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