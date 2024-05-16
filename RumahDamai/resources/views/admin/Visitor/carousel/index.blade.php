@extends('layouts.management.master')

@section('content')
    @if ($serverError)
        @include('error.500')
    @else
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="card-title">Carousel</h1>
                        <!-- Tampilkan notifikasi jika ada -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <a href="{{ route('carousel.create') }}" class="btn btn-success mb-3">Add Carousel</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousel as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="text-center" style="width: 30%;">
                                            @if (isset($item['image']))
                                                <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['title'] }}"
                                                    class="img-fluid"
                                                    style="border-radius: initial; width: 100%; height: auto; max-width: 100%;">
                                            @else
                                                No image available
                                            @endif
                                        </td>
                                        <td>{{ $item['title'] }}</td>
                                        <td>{{ $item['subtitle'] }}</td>
                                        <td>
                                            <a href="{{ route('carousel.show', $item['ID']) }}"
                                                class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('carousel.edit', $item['ID']) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('carousel.destroy', $item['ID']) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
