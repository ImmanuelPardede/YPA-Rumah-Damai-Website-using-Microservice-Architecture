@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Jenis Sponsorship</h1>

                <!-- Tampilkan notifikasi jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('sponsorship.create') }}" class="btn btn-success mb-3">Tambah Jenis Sponsorship</a>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Jenis Sponsorship</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sponsorshipList as $sponsorship)
                            <tr>
                                <td>{{ $sponsorship->jenis_sponsorship }}</td>
                                <td>
                                    <a href="{{ route('sponsorship.show', $sponsorship->id) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('sponsorship.edit', $sponsorship->id) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $sponsorship->id }}" class="d-inline"
                                        action="{{ route('sponsorship.destroy', $sponsorship->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $sponsorship->id }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Tidak ada Jenis Sponsorship.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $sponsorshipList->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
