@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Donatur</h4>
                <p class="card-description">Donatur?</p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Jenis Donasi</th>
                                        <td>
                                            @if ($donatur->donasi->count() > 0)
                                                @if ($donatur->donasi->count() == 1)
                                                    {{ $donatur->donasi->first()->jenis_donasi }}
                                                @else
                                                    @foreach ($donatur->donasi as $index => $jenis_donasi)
                                                        {{ $index + 1 }}. {{ $jenis_donasi->jenis_donasi }} <br>
                                                    @endforeach
                                                @endif
                                            @else
                                                Data tidak tersedia
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Donatur</th>
                                        <td>{{ $donatur->nama_donatur ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Donatur</th>
                                        <td>{{ $donatur->email_donatur ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Donasi</th>
                                        <td>
                                            <?php
                                            $bulanIndonesia = [
                                                1 => 'Januari',
                                                2 => 'Februari',
                                                3 => 'Maret',
                                                4 => 'April',
                                                5 => 'Mei',
                                                6 => 'Juni',
                                                7 => 'Juli',
                                                8 => 'Agustus',
                                                9 => 'September',
                                                10 => 'Oktober',
                                                11 => 'November',
                                                12 => 'Desember',
                                            ];

                                            $tanggal_donasi = isset($donatur->tanggal_donatur) ? date('d', strtotime($donatur->tanggal_donatur)) . ' ' . $bulanIndonesia[date('n', strtotime($donatur->tanggal_donatur))] . ' ' . date('Y', strtotime($donatur->tanggal_donatur)) : 'Data tidak tersedia';
                                            echo $tanggal_donasi;
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>No. Hp Donatur</th>
                                        <td>{{ $donatur->no_hp_donatur ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $donatur->deskripsi ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Donasi</th>
                                        <td>{{ isset($donatur->jumlah_donasi) ? 'Rp ' . number_format($donatur->jumlah_donasi) : 'Data tidak tersedia' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="image-frame">
                            @if ($donatur->foto_donatur)
                                <img src="{{ asset($donatur->foto_donatur) }}" alt="Foto Donatur" class="img-fluid rounded">
                            @else
                                <p>Tidak ada foto Donatur.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
