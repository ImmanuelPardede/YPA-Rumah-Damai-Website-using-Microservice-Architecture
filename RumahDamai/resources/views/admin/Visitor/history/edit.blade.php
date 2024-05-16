@extends('layouts.management.master') <!-- Meng-extend layout master -->

@section('content') <!-- Bagian content dari layout -->

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8"> <!-- Bagian kiri untuk form -->
                    <h1 class="card-title">Edit Foundation History</h1>

            <!-- Form untuk mengupdate foundation history -->
            <form method="POST" action="{{ route('history.update', $history['ID']) }}" enctype="multipart/form-data">
                @csrf <!-- Token CSRF -->
                @method('PUT') <!-- Method PUT untuk update -->

                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah Singkat</label>
                    <textarea class="form-control" id="sejarah" name="sejarah" rows="5" required>{{ $history['sejarah'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Utama</label>
                    <textarea class="form-control" id="tujuan" name="tujuan" rows="5" required>{{ $history['tujuan'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="dibangun" class="form-label">Dibangun</label>
                    <input type="text" class="form-control" id="dibangun" name="dibangun" value="{{ $history['dibangun'] }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-4"> <!-- Bagian kanan untuk gambar saat ini -->
            <!-- Tampilkan gambar saat ini -->
             @if (isset($history['image']))
             <div class="mb-3">
                 <label for="current_image" class="form-label">Current Image</label>
                 <img src="{{ Storage::url($history['image']) }}"  style="max-width: 300px;">
             </div>
            @endif
        </div>
        </div>
        </div>
    </div>
</div>

@endsection <!-- Akhir dari bagian content -->

