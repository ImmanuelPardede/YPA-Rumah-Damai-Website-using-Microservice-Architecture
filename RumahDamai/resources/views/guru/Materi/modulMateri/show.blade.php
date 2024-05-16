@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Modul Materi</h4>
                <p class="card-description">Modul Materi?</p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>
                                            @if ($modulMateri->kelas)
                                                {{ $modulMateri->kelas->nama_kelas }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Materi</th>
                                        <td>{{ $modulMateri->nama_materi ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Modul Minggu</th>
                                        <td>
                                            @if ($modulMateri->mingguPembelajaran)
                                                {{ $modulMateri->mingguPembelajaran->minggu_pembelajaran }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>File Modul</th>
                                        <td>
                                            @if ($modulMateri->file_modul)
                                                <a href="{{ route('modulMateri.download', $modulMateri->id) }}">{{ $modulMateri->file_modul }}</a>
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $modulMateri->deskripsi ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="col-md-4">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
