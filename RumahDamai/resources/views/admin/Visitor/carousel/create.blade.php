@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Add New Carousel Item</h1>

            <!-- Form untuk menambahkan carousel item -->
            <form method="POST" action="{{ route('carousel.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <!-- Input untuk caption -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title (Max 15 characters)</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" maxlength="15">
                </div>
                

                <!-- Input untuk subcaption -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle" maxlength="52">
                </div>

                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn btn-primary">Add Carousel</button>
            </form>
        </div>
    </div>
</div>
@endsection
