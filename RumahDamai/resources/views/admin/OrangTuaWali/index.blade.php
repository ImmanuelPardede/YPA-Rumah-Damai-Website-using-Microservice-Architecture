@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Orang Tua/Wali</h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('orangTuaWali.create') }}" class="btn btn-success mb-3">Tambah Orang Tua/Wali</a>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Orang Tua Dari Anak</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orangtuawaliList as $orangtuawali)
                                <tr>
                                    <td>{{ $orangtuawali->anak->nama_lengkap }}</td>
                                    <td>
                                        <a href="{{ route('orangTuaWali.show', $orangtuawali->id) }}"
                                            class="btn btn-info">Detail</a>
                                        <a href="{{ route('orangTuaWali.edit', $orangtuawali->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form method="POST" id="deleteForm{{ $orangtuawali->id }}" class="d-inline"
                                            action="{{ route('orangTuaWali.destroy', $orangtuawali->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="handleDeleteConfirmation('deleteForm{{ $orangtuawali->id }}')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada Data Orang Tua Anak.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $orangtuawaliList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
