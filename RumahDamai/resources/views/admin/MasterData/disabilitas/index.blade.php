@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Jenis Disabilitas</h1>

                <!-- Tampilkan notifikasi jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('disabilitas.create') }}" class="btn btn-success mb-3">Tambah Jenis Disabilitas</a>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Jenis Disabilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($disabilitasList as $disabilitas)
                            <tr>
                                <td>{{ $disabilitas->jenis_disabilitas }}</td>
                                <td>
                                    <a href="{{ route('disabilitas.show', $disabilitas->id) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('disabilitas.edit', $disabilitas->id) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $disabilitas->id }}" class="d-inline"
                                        action="{{ route('disabilitas.destroy', $disabilitas->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $disabilitas->id }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Tidak ada Jenis Disabilitas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $disabilitasList->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
