@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Sponsor</h1>
                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('dataSponsor.create') }}" class="btn btn-success mb-3">Tambah Sponsor</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Sponsor</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sponsorList as $sponsor)
                                <tr>
                                    <td>{{ $sponsor->nama_sponsor }}</td>
                                    <td>
                                        <a href="{{ route('dataSponsor.show', $sponsor->id) }}"
                                            class="btn btn-info">Detail</a>
                                        <a href="{{ route('dataSponsor.edit', $sponsor->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $sponsor->id }}" class="d-inline"
                                            action="{{ route('dataSponsor.destroy', $sponsor->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $sponsor->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak Data Sponsor.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $sponsorList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
