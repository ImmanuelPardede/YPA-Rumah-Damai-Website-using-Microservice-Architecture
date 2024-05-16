@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Tahun Ajaran</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tahunAjaran.update', $tahunAjaran->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tahun_ajaran">Tahun Kurikulum</label>
                <input type="year" class="form-control" name="tahun_ajaran"
                    value="{{ old('tahun_ajaran', $tahunAjaran->tahun_ajaran) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
