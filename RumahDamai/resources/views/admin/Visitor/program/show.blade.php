@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Program</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Kelas:</strong> {!! $program->kelas !!}
                    </div>
                    <div class="mb-3">
                        <strong>Gambar Program:</strong><br>
                        <img src="{{ asset($program->img_program) }}" alt="Gambar Program" class="img-fluid">
                    </div>
                    <hr>
                    <h4>Detail Program</h4>
                    @foreach ($detailPrograms as $detail)
                        <div class="mb-3">
                            <strong>Jenis Program:</strong> {{ $detail->jenis_program }}
                        </div>
                        <div class="mb-3">
                            <strong>Deskripsi:</strong> {{ $detail->deskripsi }}
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="card-footer">
                    <a href="{{ route('program.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
