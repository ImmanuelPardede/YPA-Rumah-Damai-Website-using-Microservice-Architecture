@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Kelamin</h1>

                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('jenisKelamin.create') }}" class="btn btn-success mb-3">Tambah Jenis Kelamin</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jenisKelaminList as $kelamin)
                                <tr>
                                    <td>{{ $kelamin->jenis_kelamin }}</td>
                                    <td>
                                        <a href="{{ route('jenisKelamin.edit', $kelamin->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $kelamin->id }}" class="d-inline"
                                            action="{{ route('jenisKelamin.destroy', $kelamin->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $kelamin->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data kelamin.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $jenisKelaminList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
