@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Agama</h2>

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

        <form action="{{ route('agama.update', $agama->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_agama">Nama Agama</label>
                <input type="text" class="form-control" name="agama" value="{{ old('agama', $agama->agama) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
