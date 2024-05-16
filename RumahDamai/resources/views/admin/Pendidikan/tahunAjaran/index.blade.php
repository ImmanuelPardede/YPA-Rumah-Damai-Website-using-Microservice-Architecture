@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Tahun Ajaran</h1>
                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('tahunAjaran.create') }}" class="btn btn-success mb-3">Tambah Tahun Ajaran</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tahunAjaranList as $tahunAjaran)
                                <tr>
                                    <td>{{ $tahunAjaran->tahun_ajaran }}</td>
                                    <td>
                                        <a href="{{ route('tahunAjaran.edit', $tahunAjaran->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $tahunAjaran->id }}" class="d-inline"
                                            action="{{ route('tahunAjaran.destroy', $tahunAjaran->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $tahunAjaran->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data Tahun Ajaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $tahunAjaranList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
