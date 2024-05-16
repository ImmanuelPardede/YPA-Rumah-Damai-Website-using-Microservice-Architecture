@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Donasi</h2>

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

        <form action="{{ route('donasi.update', $donasi['ID']) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="donasi">Jenis Donasi<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="donasi"
                    value="{{ $donasi['donasi'] }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi<span style="color: red">*</span></label>
                <textarea class="form-control" name="deskripsi" required>{{ $donasi['deskripsi'] }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
