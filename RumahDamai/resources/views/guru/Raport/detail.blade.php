@extends('layouts.management.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">LAPORAN HASIL BELAJAR SISWA</h2>
            <div class="table">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4"><strong>Nama</strong></div>
                            <div class="col-sm-10 bg-secondary">{{ $raport->anak->nama_lengkap }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4"><strong>Periode Bulan</strong></div>
                            <div class="col-sm-10 bg-secondary">{{ $raport->periode_bulan }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4"><strong>Tahun</strong></div>
                            <div class="col-sm-10 bg-secondary">{{ $raport->tahun }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="card-subtitle mb-2 text-muted">Detail Raports:</h6>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Area</th>
                            <th style="text-align: center;">Kemampuan yang dipelajari</th>
                            <th style="text-align: center;">Kelas Kemampuan</th>
                            <th style="text-align: center;">Naratif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $prevArea = null;
                            $nomorTampil = 0;
                        @endphp
                        @foreach ($detailraports as $index => $detailraport)
                            <tr>
                                @if ($detailraport->area !== $prevArea)
                                    @php
                                        $nomorTampil++;
                                    @endphp
                                    <td>{{ $nomorTampil }}</td>
                                @else
                                    <td></td>
                                @endif

                                <td style="font-weight: bold;">
                                    @if ($detailraport->area !== $prevArea)
                                        {{ $detailraport->area }}
                                        @php
                                            $prevArea = $detailraport->area;
                                        @endphp
                                    @endif
                                </td>

                                <td>{{ $detailraport->kemampuan }}</td>
                                <td>{{ $detailraport->kelas_kemampuan }}</td>
                                <td>
                                    @if (str_word_count($detailraport->naratif) > 6)
                                        @php
                                            $words = explode(' ', $detailraport->naratif);
                                            $chunked = array_chunk($words, 6);
                                        @endphp
                                        @foreach ($chunked as $chunk)
                                            {{ implode(' ', $chunk) }}<br>
                                        @endforeach
                                    @else
                                        {{ $detailraport->naratif }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('raport.pdf', $raport->id) }}" class="btn btn-success">Download PDF</a>
            <a href="{{ route('raport.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
