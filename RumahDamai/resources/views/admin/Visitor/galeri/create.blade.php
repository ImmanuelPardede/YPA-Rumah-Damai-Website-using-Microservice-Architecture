@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Add New galeri Item</h1>

            <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="img_galeri" class="form-label">Images (Max 15)</label>
                    <input type="file" class="form-control" id="img_galeri" name="img_galeri[]" accept="image/*" multiple required>
                </div>
                
                <div class="mb-3">
                    <label for="judul" class="form-label">judul (Max 15 characters)</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter judul" maxlength="15">
                </div>

                <div class="mb-3">
                    <label for="waktu" class="form-label">waktu (Max 15 characters)</label>
                    <input type="date" class="form-control" id="waktu" name="waktu" placeholder="Enter waktu" maxlength="15">
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">lokasi (Max 15 characters)</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Enter lokasi" maxlength="15">
                </div>

                <button type="submit" class="btn btn-primary">Add galeri Item</button>
            </form>
        </div>
    </div>
</div>


<script>
    document.getElementById('img_galeri').addEventListener('change', function() {
        var files = this.files;
        if (files.length > 15) {
            alert('You can only upload a maximum of 15 images.');
            this.value = ''; // Reset the input field
        }
    });
</script>



@endsection
