@extends('layouts.management.master')

@section('content')
    @if (empty($agama))
        <div class="">
            @include('error.500')
        </div>
    @else
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
                        @if (!empty($agama))
                            <a href="{{ route('agama.create') }}" class="btn btn-success mb-3">Tambah Agama</a>
                        @endif
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
                                @forelse ($agama as $item)
                                    <tr>
                                        <td>{{ $item['agama'] }}</td>
                                        <td>
                                            <a href="{{ route('admin.masterdata.agama.edit', $item['ID']) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form method="POST" id="deleteForm{{ $item['ID'] }}" class="d-inline"
                                                action="{{ route('admin.masterdata.agama.destroy', $item['ID']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="handleDeleteConfirmation('deleteForm{{ $item['ID'] }}')">
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
                    {{-- <div class="d-flex justify-content-end">
                    {{ $agamaList->links('pagination::bootstrap-4') }}
                </div> --}}
                </div>
            </div>
        </div>
    @endif
@endsection
