@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Jenis Anak Disabilitas</h1>

                    <!-- Tampilkan notifikasi jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>Nama Anak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anakDisabilitasList as $anakDisabilitas)
                                <tr>
                                    <td>
                                        @if ($anakDisabilitas->anak)
                                            {{ $anakDisabilitas->anak->nama_lengkap }}
                                        @else
                                            Anak not found
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('anakDisabilitas.show', $anakDisabilitas->id) }}"
                                            class="btn btn-info">Detail</a>
                                        <a href="{{ route('anakDisabilitas.edit', $anakDisabilitas->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada Jenis Anak Disabilitas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $anakDisabilitasList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
