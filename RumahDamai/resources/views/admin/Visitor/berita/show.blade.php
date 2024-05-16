@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Detail Berita</h2>

            <div class="form-group">
                <label for="image">Gambar</label>
                @if(isset($berita['image']))
                    <img src="{{ Storage::url($berita['image']) }}" class="img-fluid" alt="Gambar Berita">
                @else
                    No image available
                @endif
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" value="{{ $berita['judul'] }}" readonly>
            </div>

            <div class="form-group">
                <label for="category_id">Kategori</label>
                @foreach($categories as $key => $category)
                <input type="text" class="form-control" value="{{ $category['name'] }}" readonly>
                                
                            @endforeach
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" readonly>{{ $berita['deskripsi'] }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>

           
        </div>
    </div>
</div>

@endsection
