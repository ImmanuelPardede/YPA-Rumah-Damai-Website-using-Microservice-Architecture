@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Add New Foundation History</h1>

            <!-- Form untuk menambahkan foundation history -->
            <form method="POST" action="{{ route('history.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <!-- Input untuk sejarah singkat -->
                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah Singkat</label>
                    <textarea class="form-control" id="sejarah" name="sejarah" rows="5" placeholder="Enter brief history" maxlength="255" required></textarea>
                </div>
                
                <!-- Input untuk tujuan utama -->
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan Utama</label>
                    <textarea class="form-control" id="tujuan" name="tujuan" rows="5" placeholder="Enter main purpose" maxlength="255" required></textarea>
                </div>

                <!-- Input untuk tanggal pendirian -->
                <div class="mb-3">
                    <label for="dibangun" class="form-label">Dibangun</label>
                    <input type="text" class="form-control" id="dibangun" name="dibangun" required>
                </div>

                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary">Add Foundation History</button>
            </form>
        </div>
    </div>
</div>
@endsection
