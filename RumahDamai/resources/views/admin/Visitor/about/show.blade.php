<!-- resources/views/about/show.blade.php -->
@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Informasi About</h4>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Latar Belakang</th>
                                        <td>{!! nl2br(e($abouts->latar_belakang)) ?? 'Data tidak tersedia' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Visi</th>
                                        <td>{!! nl2br(e($abouts->visi)) ?? 'Data tidak tersedia' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Misi</th>
                                        <td>{!!$abouts->misi!!}</td>
                                    </tr>
                                    <tr>
                                        <th>Wilayah 1</th>
                                        <td>{!! nl2br(e($abouts->wilayah1)) ?? 'Data tidak tersedia' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Wilayah 2</th>
                                        <td>{!! nl2br(e($abouts->wilayah2)) ?? 'Data tidak tersedia' !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="image-frame">
                            @if ($abouts->img_yayasan)
                                <h5>Gambar Yayasan</h5>
                                <img src="{{ asset($abouts->img_yayasan) }}" alt="Gambar Yayasan" class="img-fluid rounded">
                            @else
                                <p>Gambar Yayasan tidak tersedia.</p>
                            @endif
                            @if ($abouts->img_wilayah1)
                                <h5>Gambar Wilayah 1</h5>
                                <img src="{{ asset($abouts->img_wilayah1) }}" alt="Gambar Wilayah 1" class="img-fluid rounded">
                            @else
                                <p>Gambar Wilayah 1 tidak tersedia.</p>
                            @endif
                            @if ($abouts->img_wilayah2)
                                <h5>Gambar Wilayah 2</h5>
                                <img src="{{ asset($abouts->img_wilayah2) }}" alt="Gambar Wilayah 2" class="img-fluid rounded">
                            @else
                                <p>Gambar Wilayah 2 tidak tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('about.index') }}" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
