@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Anak Non Disabilitas</h1>

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
                            @forelse ($anakNonDisabilitasList as $anakNonDisabilitas)
                                <tr>
                                    <td>{{ $anakNonDisabilitas->anak->nama_lengkap }}</td>
                                    <td>
                                        @if ($anakNonDisabilitas->anak)
                                            {{ $anakNonDisabilitas->anak->nama_lengkap }}
                                        @else
                                            Anak not found
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('anakNonDisabilitas.show', $anakNonDisabilitas->id) }}"
                                            class="btn btn-info">Detail</a>
                                        <a href="{{ route('anakNonDisabilitas.edit', $anakNonDisabilitas->id) }}"
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
                    {{ $anakNonDisabilitasList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
