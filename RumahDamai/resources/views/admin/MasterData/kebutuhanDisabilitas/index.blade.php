@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Jenis Kebutuhan Disabilitas</h1>

                <!-- Tampilkan notifikasi jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('kebutuhanDisabilitas.create') }}" class="btn btn-success mb-3">Tambah Jenis Kebutuhan Disabilitas</a>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Kebutuhan Disabilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kebutuhanDisabilitasList as $kebutuhan_disabilitas)
                            <tr>
                                <td>{{ $kebutuhan_disabilitas->jenis_kebutuhan_disabilitas }}</td>
                                <td>
                                    <a href="{{ route('kebutuhanDisabilitas.show', $kebutuhan_disabilitas->id) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('kebutuhanDisabilitas.edit', $kebutuhan_disabilitas->id) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $kebutuhan_disabilitas->id }}" class="d-inline"
                                        action="{{ route('kebutuhanDisabilitas.destroy', $kebutuhan_disabilitas->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $kebutuhan_disabilitas->id }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Tidak ada data Kebutuhan Disabilitas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $kebutuhanDisabilitasList->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
