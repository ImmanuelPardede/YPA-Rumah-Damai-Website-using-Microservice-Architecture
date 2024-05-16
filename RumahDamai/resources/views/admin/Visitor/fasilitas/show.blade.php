@extends('layouts.management.master')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Informasi Fasilitas</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Gambar Fasilitas</h5>
                    <div class="row">
                        @foreach ($detailFasilitas as $detail)
                            <div class="col-md-4 mb-4">
                                <div class="image-frame">
                                    <img src="{{ asset($detail->img_fasilitas) }}" alt="Gambar Fasilitas" class="img-fluid rounded">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Fasilitas</th>
                                    <td>{!! $fasilitas->fasilitas ?? 'Data tidak tersedia' !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('fasilitas.index') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
</div>

@endsection
