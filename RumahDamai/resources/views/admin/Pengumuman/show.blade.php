@extends('layouts.management.master')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-body">
                    <h4><span class="text-primary">[{{ $pengumuman->kategori }}]</span> {{ $pengumuman->judul }}</h4>
                    <hr>
                    <p>
                        <div class="container">
                        {!! $pengumuman->deskripsi !!}
                    </p>
                    {{ $lokasi->where('id', $pengumuman->user->lokasi_penugasan_id)->first()->lokasi }}, {{ $pengumuman->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}

                    <a href="{{ route('dashboard') }}" class="btn btn-primary float-right mt-3">Kembali</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
