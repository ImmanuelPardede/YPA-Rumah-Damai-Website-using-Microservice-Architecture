@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Daftar Akun Direktur</h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @php
                        $direkturCount = $users->where('role', 'direktur')->count();
                    @endphp
                    @if ($direkturCount === 0)
                        <a href="{{ route('admin.administrator.create', ['role' => 'direktur']) }}" class="btn btn-success mb-3">Tambah Direktur</a>
                    @endif
                </div>

                <div class="table-responsive">
                    @if ($users->count() > 0)
                        <table class="table mt-3 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users->where('role', 'direktur') as $user)
                                    <tr>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('admin.administrator.show', $user->id) }}"
                                                class="btn btn-info">Detail</a>
                                            <a href="{{ route('admin.administrator.edit', $user->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form method="POST" id="deleteForm{{ $user->id }}" class="d-inline"
                                                action="{{ route('admin.administrator.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="handleDeleteConfirmation('deleteForm{{ $user->id }}')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada akun admin yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
