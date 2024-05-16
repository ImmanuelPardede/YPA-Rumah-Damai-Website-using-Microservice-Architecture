@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Kelas</h1>
                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('kelas.create') }}" class="btn btn-success mb-3">Tambah Kelas</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelasList as $kelas)
                                <tr>
                                    <td>{{ $kelas->nama_kelas }}</td>
                                    <td>
                                        <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $kelas->id }}" class="d-inline"
                                            action="{{ route('kelas.destroy', $kelas->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $kelas->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data kelas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $kelasList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
