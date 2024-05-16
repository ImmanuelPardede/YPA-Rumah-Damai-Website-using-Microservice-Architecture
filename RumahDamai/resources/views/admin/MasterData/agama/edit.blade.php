@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Agama</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.masterdata.agama.update', $agama['ID']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="agama">Nama Agama</label>
                <input type="text" class="form-control" name="agama" value="{{ $agama['agama'] }}">
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
@endsection
