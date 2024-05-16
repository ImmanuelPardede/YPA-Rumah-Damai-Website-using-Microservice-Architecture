@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Foundation History Detail</h1>

            @if ($history)
            <div class="table-responsive">
                <table class="table mt-3">
                    <tr>
                        <th>ID</th>
                        <td>{{ $history->id }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{ asset($history->gambar) }}" alt="Foundation Image" class="img-fluid" style="max-width: 200px;">
                        </td>
                    </tr>
                    <tr>
                        <th>Sejarah Singkat</th>
                        <td>{{ $history->sejarah_singkat }}</td>
                    </tr>
                    <tr>
                        <th>Tujuan Utama</th>
                        <td>{{ $history->tujuan_utama }}</td>
                    </tr>
                    <tr>
                        <th>Dibangun</th>
                        <td>{{ $history->dibangun }}</td>
                    </tr>
                </table>
            </div>
            @else
            <p>Foundation history not found.</p>
            @endif

            <div class="mt-4">
                <a href="{{ route('history.index') }}" class="btn btn-primary">Back to History List</a>
            </div>
        </div>
    </div>
</div>
@endsection
