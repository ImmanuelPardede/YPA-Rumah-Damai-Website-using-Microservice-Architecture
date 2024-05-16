@extends('layouts.management.master')

@section('content')
    @if (empty($carousel))
        <div class="marquee">
            @include('error.500')
        </div>
    @else
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="card-title">Foundation History</h1>
                        <!-- Tampilkan notifikasi jika ada -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (!empty($carousel))
                            <!-- Tampilkan tombol "Add New Foundation History" -->
                            <a href="{{ route('history.create') }}" class="btn btn-success mb-3">Add New Foundation
                                History</a>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table mt-3 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th>Sejarah</th>
                                    <th>Tujuan</th>
                                    <th>Dibangun</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($history as $index)
                                    <tr>
                                        <td class="text-center" style="width: 30%;">
                                            @if (isset($index['image']))
                                                <img src="{{ Storage::url($index['image']) }}" class="img-fluid"
                                                    style="border-radius: initial; width: 100%; height: auto; max-width: 100%;">
                                            @else
                                                No image available
                                            @endif
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::words($index['sejarah'], 3, '...') }}</td>
                                        <td>{{ \Illuminate\Support\Str::words($index['tujuan'], 3, '...') }}</td>
                                        <td>{{ $index['dibangun'] }}</td>
                                        <td>
                                            <a href="{{ route('history.show', $index['ID']) }}"
                                                class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('history.edit', $index['ID']) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('history.destroy', $index['ID']) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No foundation history found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
