@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Data Tingkat Pendidikan</h1>

                <!-- Tampilkan notifikasi jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('pendidikan.create') }}" class="btn btn-success mb-3">Tambah Tingkat Pendidikan</a>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Tingkat Pendidikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenis_pendidikan as $jenis_pendidikan)
                            <tr>
                                <td>{{ $jenis_pendidikan['jenis_pendidikan'] }}</td>
                                <td>
                                    <a href="{{ route('pendidikan.edit', $jenis_pendidikan['ID']) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $jenis_pendidikan['ID'] }}" class="d-inline"
                                        action="{{ route('pendidikan.destroy', $jenis_pendidikan['ID']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $jenis_pendidikan['ID'] }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Tidak ada data tingkat pendidikan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- <div class="d-flex justify-content-end">
                {{ $pendidikanList->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
