@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Pekerjaan</h2>

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

        <form action="{{ route('pekerjaan.update', $jenisPekerjaan->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                <input type="text" class="form-control" name="jenis_pekerjaan"
                    value="{{ old('jenis_pekerjaan', $jenisPekerjaan->jenis_pekerjaan) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
