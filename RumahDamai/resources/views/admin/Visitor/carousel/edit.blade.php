@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit Carousel Item</h1>

            <!-- Form untuk mengupdate carousel item -->
            <form method="POST" action="{{ route('carousel.update', $carousel['ID']) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Input untuk caption -->
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $carousel['title'] }}" placeholder="Enter caption" maxlength="50">
                </div>

                <!-- Input untuk subcaption -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label">subtitle (Max 50 characters)</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $carousel['subtitle'] }}" placeholder="Enter subcaption" maxlength="52">
                </div>
                

                <!-- Input untuk gambar -->
                <div class="mb-3">
                    <label for="image" class="form-label">New Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <!-- Tampilkan gambar saat ini -->
                @if (isset($image['image']))
                    <div class="mb-3">
                        <label for="current_image" class="form-label">Current Image</label>
                        <img src="{{ Storage::url($carousel['image']) }}" alt="{{ $carousel['title'] }}" style="max-width: 300px;">
                    </div>
                @endif

                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary">Update Carousel Item</button>
            </form>
        </div>
    </div>
</div>
@endsection
