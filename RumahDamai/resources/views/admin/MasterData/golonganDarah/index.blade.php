@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h1 class="card-title">Data Golongan Darah</h1>

                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('golonganDarah.create') }}" class="btn btn-success mb-3">Tambah Jenis Golongan Darah</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Golongan Darah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($golongan_darah as $darah)
                        <tr>
                            <td>{{ $darah['golongan_darah'] }}</td> <!-- Fix variable name -->
                            <td>
                                <a href="{{ route('golonganDarah.edit', $darah['ID']) }}" class="btn btn-warning">Edit</a> <!-- Fix variable name -->
                                <form method="POST" id="deleteForm{{ $darah['ID'] }}" class="d-inline"
                                    action="{{ route('golonganDarah.destroy', $darah['ID']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="handleDeleteConfirmation('deleteForm{{ $darah['ID'] }}')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">Tidak ada data golongan darah.</td> <!-- Fix message -->
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- <div class="d-flex justify-content-end">
                {{ $golonganDarahList->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
