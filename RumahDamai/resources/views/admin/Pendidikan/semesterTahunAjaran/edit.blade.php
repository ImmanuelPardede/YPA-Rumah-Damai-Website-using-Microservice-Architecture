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

        <form action="{{ route('semesterTahunAjaran.update', $semesterTahunAjaran->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="semester_tahun_ajaran">Tahun Ajaran</label>
                <input type="text" class="form-control" name="semester_tahun_ajaran"
                    value="{{ old('semester_tahun_ajaran', $semesterTahunAjaran->semester_tahun_ajaran) }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
