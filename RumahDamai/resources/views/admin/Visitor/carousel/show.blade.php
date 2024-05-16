@extends('layouts.management.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Carousel Item Detail</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Caption:</strong>
                <p>{{ $carouselItem->caption }}</p>
            </div>
            <div class="mb-3">
                <strong>Subcaption:</strong>
                <p>{{ $carouselItem->subcaption }}</p>
            </div>
            @if ($carouselItem->image_url)
            <div class="mb-3">
                <strong>Image:</strong>
                <img src="{{ asset($carouselItem->image_url) }}" alt="Carousel Image" style="max-width: 300px;">
            </div>
            @endif
            <div class="mt-4">
                <a href="{{ route('carousel.index') }}" class="btn btn-secondary">Back to Carousel List</a>
            </div>
        </div>
    </div>
</div>
@endsection
