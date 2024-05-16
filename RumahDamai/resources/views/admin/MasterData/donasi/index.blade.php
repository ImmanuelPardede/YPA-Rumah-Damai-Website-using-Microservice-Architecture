@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Jenis Donasi</h1>

                <!-- Tampilkan notifikasi jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('donasi.create') }}" class="btn btn-success mb-3">Tambah Jenis Donasi</a>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Jenis Donasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($donasi as $donasi)
                            <tr>
                                <td>{{ $donasi['donasi'] }}</td>
                                <td>
                                    <a href="{{ route('donasi.show', $donasi['ID']) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('donasi.edit', $donasi['ID']) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $donasi['ID'] }}" class="d-inline"
                                        action="{{ route('donasi.destroy', $donasi['ID']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $donasi['ID'] }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Tidak ada Jenis Donasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- <div class="d-flex justify-content-end">
                {{ $donasiList->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
