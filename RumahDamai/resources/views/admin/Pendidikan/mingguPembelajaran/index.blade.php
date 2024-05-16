@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Minggu Pembelajaran</h1>
                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('mingguPembelajaran.create') }}" class="btn btn-success mb-3">Tambah Minggu
                        Pembelajaran</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>Minggu Pembelajaran</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mingguPembelajaranList as $mingguPembelajaran)
                                <tr>
                                    <td>{{ $mingguPembelajaran->minggu_pembelajaran }}</td>
                                    <td>{{ $mingguPembelajaran->tanggal_mulai }}</td>
                                    <td>{{ $mingguPembelajaran->tanggal_berakhir }}</td>
                                    <td>
                                        <a href="{{ route('mingguPembelajaran.edit', $mingguPembelajaran->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $mingguPembelajaran->id }}" class="d-inline"
                                            action="{{ route('mingguPembelajaran.destroy', $mingguPembelajaran->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $mingguPembelajaran->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data Minggu Pembelajaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $mingguPembelajaranList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
