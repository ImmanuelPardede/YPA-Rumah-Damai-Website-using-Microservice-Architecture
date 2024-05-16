@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit Galeri Item</h1>

            <!-- Form untuk mengupdate fasilitas item -->
            <form method="POST" action="{{ route('galeri.update', $galeri->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $galeri->judul }}" placeholder="Enter judul" maxlength="50">
                </div>

                <div class="mb-3">
                    <label for="waktu" class="form-label">waktu</label>
                    <input type="date" class="form-control" id="waktu" name="waktu" value="{{ $galeri->waktu }}" placeholder="Enter waktu" maxlength="50">
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $galeri->lokasi }}" placeholder="Enter lokasi" maxlength="50">
                </div>


                <!-- Tampilkan gambar saat ini dan input untuk mengganti atau menghapus gambar -->
            @foreach ($galeri->detailgaleri as $index => $detailgaleri)
            <div class="mb-4">
            <label for="img_galeri" class="form-label">Gambar{{ $index + 1 }}</label>
    <div class="input-group">
        <input type="file" class="form-control" id="img_galeri" name="img_galeri[{{ $index }}]" accept="image/*">
        <div class="input-group-append">
            <span class="input-group-text">
                Klik Choose File untuk Mengubah gambarnya
            </span>
        </div>
    </div>                    
    <div class="mt-2">
        @if ($detailgaleri->img_galeri)
    <img src="{{ asset($detailgaleri->img_galeri) }}" alt="Current Image" class="img-fluid" style="max-width: 300px;">
    <a href="" onclick="deleteImage('{{ route('galeri.deleteImage', $detailgaleri->id) }}')" class="btn btn-danger btn-sm mt-2">Hapus</a>
@endif
    </div>
    <small class="text-muted">Max file size: 2MB | Allowed formats: jpeg, png, jpg, gif</small>
</div>
@endforeach




                <div id="new_img_fasilitas">

                </div>


                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary">Update galeri Item</button>
                <button type="button" class="btn btn-success" id="addImageButton">Tambah Gambar</button>

            </form>
        </div>
    </div>
</div>




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
        window.location.href = "{{ route('galeri.edit', $galeri->id) }}";
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
        newInputFile.name = 'new_img_galeri[]'; // Sesuaikan dengan nama input Anda
        newInputFile.accept = 'image/*';
        newInputFile.multiple = true;

        // Buat div untuk wrapping input file baru
        var newInputFileWrapper = document.createElement('div');
        newInputFileWrapper.className = 'mb-4';

        // Buat label untuk input file baru
        var newLabel = document.createElement('label');
        newLabel.setAttribute('for', 'new_img_galeri');
        newLabel.className = 'form-label';
        newLabel.textContent = 'Tambah Gambar Baru';

        // Sisipkan input file baru dan label ke dalam div wrapper
        newInputFileWrapper.appendChild(newLabel);
        newInputFileWrapper.appendChild(newInputFile);

        // Sisipkan div wrapper ke dalam elemen #new_img_fasilitas
        document.getElementById('new_img_fasilitas').appendChild(newInputFileWrapper);
    });
</script>

@endsection
