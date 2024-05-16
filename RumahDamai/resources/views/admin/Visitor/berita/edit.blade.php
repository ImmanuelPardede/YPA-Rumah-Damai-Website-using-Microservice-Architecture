@extends('layouts.management.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Edit Berita</h2>
            <form action="{{ route('berita.update', $berita['ID']) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul<span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="judul" value="{{ $berita['judul'] }}" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori<span style="color: red">*</span></label>
                    <select class="form-control js-example-basic-single" id="category_id" name="category_id" required>
                        @foreach ($categories as $kategoriItem)
                            <option value="{{ $kategoriItem['id'] }}" {{ $kategoriItem['id'] == $berita['category_id'] ? 'selected' : '' }}>
                                {{ $kategoriItem['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">deskripsi<span style="color: red">*</span></label>
                    <textarea class="form-control" name="deskripsi" required>{{ $berita['deskripsi'] }}</textarea>
                </div>
              
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @if(isset($berita['image']))
                    <img src="{{ Storage::url($berita['image']) }}" class="img-fluid" style="border-radius: initial; width: 100%; height: auto; max-width: 100%;">
                @else
                    No image available
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
