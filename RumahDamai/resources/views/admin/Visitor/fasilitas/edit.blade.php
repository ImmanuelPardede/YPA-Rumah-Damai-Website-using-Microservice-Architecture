@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit Fasilitas Item</h1>

            <!-- Form untuk mengupdate fasilitas item -->
            <form method="POST" action="{{ route('fasilitas.update', $fasilitas->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">fasilitas<span style="color: red">*</span></label>
                    <textarea id="editor1" class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" required autocomplete="fasilitas">
                        {{ $fasilitas->fasilitas }}
                        </textarea>
                    @error('fasilitas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Tampilkan gambar saat ini dan input untuk mengganti atau menghapus gambar -->
                @foreach ($fasilitas->detailFasilitas as $index => $detailFasilitas)
                <div class="mb-4">
                    <label for="img_fasilitas_{{ $index }}" class="form-label">Gambar {{ $index + 1 }}</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="img_fasilitas_{{ $index }}" name="img_fasilitas[{{ $index }}]" accept="image/*">
                        <div class="input-group-append">
                                <span class="input-group-text">
                                    Klik Chose File untuk Mengubah gambarnya
                                </span>
                            </div>
                        </div>
                    
                    <div class="mt-2">
                        @if ($detailFasilitas->img_fasilitas)
                        <img src="{{ asset($detailFasilitas->img_fasilitas) }}" alt="Current Image" class="img-fluid" style="max-width: 300px;">
                        <form action="{{ route('fasilitas.deleteImage', $detailFasilitas->id) }}" method="POST">
                            <a href="" onclick="deleteImage('{{ route('fasilitas.deleteImage', $detailFasilitas->id) }}')" class="btn btn-danger btn-sm mt-2">Hapus</a>
                            @endif

                    </div>
                    <small class="text-muted">Max file size: 2MB | Allowed formats: jpeg, png, jpg, gif</small>
                </div>
                @endforeach





                <div id="new_img_fasilitas">

                </div>
                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary">Update Fasilitas Item</button>
                <button type="button" class="btn btn-success" id="addImageButton">Tambah Gambar</button>

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

<script>
    function deleteImage(deleteUrl) {
        if (confirm('Apakah Anda yakin ingin menghapus gambar?')) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
    if (response.ok) {
        // Jika penghapusan berhasil, arahkan pengguna kembali ke halaman galeri.edit
        window.location.href = "{{ route('fasilitas.edit', $fasilitas->id) }}";
    } else {
        // Tangani kesalahan jika penghapusan gagal
        console.error('Gagal menghapus gambar.');
    }
})
.catch(error => console.error('Ada kesalahan:', error));

        }
    }
</script>

<script>
    document.getElementById('addImageButton').addEventListener('click', function() {
        // Buat elemen input file baru
        var newInputFile = document.createElement('input');
        newInputFile.type = 'file';
        newInputFile.className = 'form-control';
        newInputFile.name = 'new_img_fasilitas[]';
        newInputFile.accept = 'image/*';
        newInputFile.multiple = true;

        // Buat div untuk wrapping input file baru
        var newInputFileWrapper = document.createElement('div');
        newInputFileWrapper.className = 'mb-4';
        
        // Buat label untuk input file baru
        var newLabel = document.createElement('label');
        newLabel.setAttribute('for', 'new_img_fasilitas');
        newLabel.className = 'form-label';
        newLabel.textContent = 'Gambar Baru';

        // Sisipkan input file baru dan label ke dalam div wrapper
        newInputFileWrapper.appendChild(newLabel);
        newInputFileWrapper.appendChild(newInputFile);
        
        // Sisipkan div wrapper ke dalam elemen #new_img_fasilitas
        document.getElementById('new_img_fasilitas').appendChild(newInputFileWrapper);
    });
</script>


@endsection
