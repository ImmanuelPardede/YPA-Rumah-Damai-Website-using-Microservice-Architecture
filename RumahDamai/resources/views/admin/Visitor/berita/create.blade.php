@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Tambah Anak</h2>
            <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="judul">Judul<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="judul" required id="judulInput">
                    <small class="text-muted" id="wordCountInfo">Maksimal 10 kata.</small>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori<span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="category_id" name="category_id" required>
                        <option value="" disabled selected>Pilih kategori berita</option>
                        @foreach ($category as $kategoriItem)
                            <option value="{{ $kategoriItem['id'] }}">{{ $kategoriItem['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="deskripsi">Deskripsi<span style="color: red">*</span></label>
                    <textarea class="form-control" name="deskripsi" required id="deskripsi"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required accept="image/*">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
