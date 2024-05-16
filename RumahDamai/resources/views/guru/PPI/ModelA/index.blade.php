@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Anak Didik</h1>
                </div>

                <div class="table-responsive">
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap Anak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td><a href="{{ route('PPI.ModelA.show', $data->id) }}" class="btn btn-primary">Show</a>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($anak->isEmpty())
                                <tr>
                                    <td colspan="4">Tidak ada Data Anak.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
