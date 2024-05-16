@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Pengumuman</div>

                    <div class="card-body">
                        <form action="{{ route('pengumuman.update', ['id' => $pengumuman->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="judul" class="col-md-4 col-form-label text-md-right">Judul</label>
                                <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control" name="judul"
                                        value="{{ $pengumuman->judul }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>
                                <div class="col-md-6">
                                    <textarea id="deskripsi" cl ass="form-control" name="deskripsi">{{ $pengumuman->deskripsi }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>
                                <div class="col-md-6">
                                    <input id="kategori" type="text" class="form-control" name="kategori"
                                        value="{{ $pengumuman->kategori }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                                        onclick="handleUpdatedConfirmation(event)">Perbarui Pengumuman</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
