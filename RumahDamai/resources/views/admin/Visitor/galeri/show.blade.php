@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Galeri</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Judul:</strong> {{ $galeri->judul }}
                    </div>
                    <hr>
                    <div class="mb-3">
                        <strong>Lokasi:</strong> {{ $galeri->lokasi }}
                    </div>
                    <hr>
                    <div class="mb-3">
                        <strong>Waktu:</strong> {{ $galeri->waktu }}
                    </div>
                    <hr>
                    <h4>Detail galeri</h4>
                    @foreach ($detailgaleri as $detail)
                        <div class="mb-3 text-center">
                            <img src="{{ asset($detail->img_galeri) }}" alt="Gambar galeri" class="img-fluid">
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
