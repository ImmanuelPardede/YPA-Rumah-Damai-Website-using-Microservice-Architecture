@extends('layouts.management.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Fasilitas</h1>
                <!-- Tampilkan notifikasi jika ada -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($fasilitas)
                <a href="{{ route('fasilitas.create') }}" class="btn btn-success mb-3">Tambahkan Data</a>
                @endif

            </div>



            <div class="table-responsive">
                <table class="table mt-3 ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Image</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fasilitas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td style="max-width: 200px;">
                                @if ($item->detailFasilitas->isNotEmpty())
                                <?php $detail = $item->detailFasilitas->first(); ?>
                                <img src="{{ asset($detail->img_fasilitas) }}" alt="Fasilitas Image" class="img-fluid" style="border-radius: initial; width: 100%; height: auto; max-width: 100%;">
                            @else
                                <p>No Image</p>
                            @endif
                            </td>
                            <td>{!! $item->fasilitas !!}</td>
                            <td>
                                <a href="{{ route('fasilitas.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="{{ route('fasilitas.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
