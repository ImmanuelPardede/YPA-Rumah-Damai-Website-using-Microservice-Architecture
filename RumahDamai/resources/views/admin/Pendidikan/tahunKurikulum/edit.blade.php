@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Tahun Kurikulum</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tahunKurikulum.update', $tahunKurikulum->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tahun_kurikulum">Tahun Kurikulum</label>
                <input type="number" class="form-control" name="tahun_kurikulum"
                    value="{{ old('tahun_kurikulum', $tahunKurikulum->tahun_kurikulum) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
