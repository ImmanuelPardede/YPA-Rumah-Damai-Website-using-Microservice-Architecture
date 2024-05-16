@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Jenis Golongan Darah</h2>

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

        <form action="{{ route('golonganDarah.update', $golonganDarah['ID']) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="golongan_darah">Jenis Kelamin</label>
                <input type="text" class="form-control" name="golongan_darah"
                    value="{{ $golonganDarah['golongan_darah'] }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
