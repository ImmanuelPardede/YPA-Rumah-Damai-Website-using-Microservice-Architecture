@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Donatur</h1>
                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('dataDonatur.create') }}" class="btn btn-success mb-3">Tambah Donatur</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Donatur</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donaturList as $donatur)
                                <tr>
                                    <td>{{ $donatur->nama_donatur }}</td>
                                    <td>
                                        <a href="{{ route('dataDonatur.show', $donatur->id) }}"
                                            class="btn btn-info">Detail</a>
                                        <a href="{{ route('dataDonatur.edit', $donatur->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $donatur->id }}" class="d-inline"
                                            action="{{ route('dataDonatur.destroy', $donatur->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $donatur->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak Data Donatur.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $donaturList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
