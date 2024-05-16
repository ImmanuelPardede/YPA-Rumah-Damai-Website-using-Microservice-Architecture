@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Penyakit</h2>

        <!-- Tampilkan pesan kesalahan validasi jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penyakit.update', $jenis_penyakit['ID']) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_penyakit">Jenis Penyakit</label>
                <input type="text" class="form-control" name="jenis_penyakit"
                    value="{{ old('jenis_penyakit', $jenis_penyakit['jenis_penyakit']) }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $jenis_penyakit['deskripsi']) }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
