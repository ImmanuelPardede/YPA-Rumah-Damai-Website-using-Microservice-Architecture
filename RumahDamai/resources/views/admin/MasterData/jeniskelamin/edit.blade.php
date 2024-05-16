@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Kelamin</h2>

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

        <form action="{{ route('jenisKelamin.update', $jenis_kelamin['ID']) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin"
                    value="{{ old('jenis_kelamin', $jenis_kelamin['jenis_kelamin']) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
