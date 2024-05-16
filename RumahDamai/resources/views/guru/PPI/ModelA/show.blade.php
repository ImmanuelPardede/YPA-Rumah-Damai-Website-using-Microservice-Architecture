@extends('layouts.management.master')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title">Data Anak Didik</h1>
                </div>
<<<<<<< Updated upstream
                
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ppiA as $key => $ppia)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $ppia->created_at }}</td>
                            <td>
                                <a href="{{ route('PPI.ModelA.detail', ['id' => $ppia->id]) }}" class="btn btn-info btn-sm">Detail</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
=======

                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            @if ($ppiA->isNotEmpty())
                                <p>{{ $ppiA->first()->anak->nama_lengkap }}</p>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('PPI.ModelA.create') }}" class="btn btn-success">Create PPI A</a>
                        </div>
                    </div>

                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ppiA as $key => $ppia)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $ppia->created_at }}</td>
                                    <td>
                                        {{--                                 <a href="{{ route('raport.destroy', $ppia->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $ppia->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $ppia->id }}" action="{{ route('raport.destroy', $ppia->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <a href="{{ route('raport.edit', $ppia->id) }}" class="btn btn-warning">Edit</a>

                                <a href="{{ route('raport.detail', $ppia->id) }}" class="btn btn-info">Detail</a>
 --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
@endsection
