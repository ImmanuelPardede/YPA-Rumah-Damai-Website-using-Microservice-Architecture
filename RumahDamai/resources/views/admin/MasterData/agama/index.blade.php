@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Agama</h1>
                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('agama.create') }}" class="btn btn-success mb-3">Tambah Agama</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>Nama Agama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agamaList as $agama)
                                <tr>
                                    <td>{{ $agama->agama }}</td>
                                    <td>
                                        <a href="{{ route('agama.edit', $agama->id) }}" class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $agama->id }}" class="d-inline"
                                            action="{{ route('agama.destroy', $agama->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $agama->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data agama.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $agamaList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
