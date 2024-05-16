@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Silabus</h4>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Tahun Kurikulum</th>
                                        <td>
                                            @if ($silabus->tahunKurikulum)
                                                {{ $silabus->tahunKurikulum->tahun_kurikulum }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>
                                            @if ($silabus->kelas)
                                                {{ $silabus->kelas->nama_kelas }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Guru</th>
                                        <td>
                                            @if ($silabus->user)
                                                {{ $silabus->user->nama_lengkap }}
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $silabus->deskripsi ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Hasil Kursus</th>
                                        <td>{{ $silabus->hasil_kursus ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Pembelajaran</th>
                                        <td>{{ $silabus->tipe_pembelajaran ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penilaian</th>
                                        <td>{{ $silabus->penilaian ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Konten Kursus</th>
                                        <td>{{ $silabus->konten_kursus ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Buku Pegangan Dan Referensi</th>
                                        <td>{{ $silabus->buku_pegangan_dan_referensi ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alat</th>
                                        <td>{{ $silabus->alat ?? 'Data tidak tersedia' }}</td>
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
