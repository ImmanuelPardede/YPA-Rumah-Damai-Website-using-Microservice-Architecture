@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Semester Tahun Ajaran</h1>
                <!-- Tampilkan notifikasi jika ada -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('semesterTahunAjaran.create') }}" class="btn btn-success mb-3">Tambah Semester Ajaran</a>
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
                        @forelse ($semesterTahunAjaranList as $semesterTahunAjaran)
                            <tr>
                                <td>{{ $semesterTahunAjaran->semester_tahun_ajaran }}</td>
                                <td>
                                    <a href="{{ route('semesterTahunAjaran.edit', $semesterTahunAjaran->id) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $semesterTahunAjaran->id }}" class="d-inline"
                                        action="{{ route('semesterTahunAjaran.destroy', $semesterTahunAjaran->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $semesterTahunAjaran->id }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Tidak ada data Tahun Semester Tahun Ajaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $semesterTahunAjaranList->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
