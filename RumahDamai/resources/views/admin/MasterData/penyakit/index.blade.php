@extends('layouts.management.master')

@section('content')
    @if (empty($jenis_penyakit))
        <div class="marquee">
            @include('error.500')
        </div>
    @else
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="card-title">Jenis Penyakit</h1>
                        <!-- Tampilkan notifikasi jika ada -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (!empty($jenis_penyakit))
                            <a href="{{ route('penyakit.create') }}" class="btn btn-success mb-3">Tambah Jenis Penyakit</a>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table mt-3 table-hover">
                            <thead>
                                <tr>
                                    <th>Jenis Penyakit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jenis_penyakit as $jenis_penyakit)
                                    <tr>
                                        <td>{{ $jenis_penyakit['jenis_penyakit'] }}</td>
                                        <td>
                                            <a href="{{ route('penyakit.show', $jenis_penyakit['ID']) }}"
                                                class="btn btn-info">Detail</a>
                                            <a href="{{ route('penyakit.edit', $jenis_penyakit['ID']) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form method="POST" id="deleteForm{{ $jenis_penyakit['ID'] }}" class="d-inline"
                                                action="{{ route('penyakit.destroy', $jenis_penyakit['ID']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="handleDeleteConfirmation('deleteForm{{ $jenis_penyakit['ID'] }}')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada Jenis Penyakit.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="d-flex justify-content-end">
                {{ $penyakitList->links('pagination::bootstrap-4') }}
            </div> --}}
                </div>
            </div>
        </div>
    @endif
@endsection
