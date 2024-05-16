@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Jadwal Pembelajaran</h2>
                <form
                    action="{{ isset($jadwalPembelajaran) ? route('jadwalPembelajaran.update', $jadwalPembelajaran->id) : route('jadwalPembelajaran.store') }}"
                    method="POST">
                    @csrf
                    @isset($jadwalPembelajaran)
                        @method('PUT')
                        <input type="hidden" name="jadwal_pembelajaran_id" value="{{ $jadwalPembelajaran->id }}">
                    @endisset
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" disabled>
                            @foreach ($daftarKelas as $kelas)
                                <option value="{{ $kelas->id }}"
                                    {{ old('kelas_id', isset($jadwalPembelajaran) ? $jadwalPembelajaran->kelas_id : '') == $kelas->id ? 'selected' : '' }}>
                                    {{ $kelas->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="minggu_pembelajaran_id">Minggu Pembelajaran</label>
                        <select name="minggu_pembelajaran_id" id="minggu_pembelajaran_id" class="form-control" disabled>
                            @foreach ($daftarMingguPembelajaran as $mingguPembelajaran)
                                <option value="{{ $mingguPembelajaran->id }}"
                                    {{ old('minggu_pembelajaran_id', isset($jadwalPembelajaran) ? $jadwalPembelajaran->minggu_pembelajaran_id : '') == $mingguPembelajaran->id ? 'selected' : '' }}>
                                    {{ $mingguPembelajaran->minggu_pembelajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="modul_materi_id">Modul Materi</label>
                        <select name="modul_materi_id" id="modul_materi_id" class="form-control" disabled>
                            @foreach ($daftarModulMateri as $modulMateri)
                                <option value="{{ $modulMateri->id }}"
                                    {{ isset($jadwalPembelajaran) && $jadwalPembelajaran->modul_materi_id == $modulMateri->id ? 'selected' : '' }}>
                                    {{ $modulMateri->nama_materi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="guru_id">Nama Guru</label>
                        <select name="guru_id" id="guru_id" class="form-control" disabled>
                            @foreach ($daftarGuru as $guru)
                                <option value="{{ $guru->id }}"
                                    {{ isset($jadwalPembelajaran) && $jadwalPembelajaran->guru_id == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_penugasan_id">Lokasi Penugasan</label>
                        <select name="lokasi_penugasan_id" id="lokasi_penugasan_id" class="form-control" disabled>
                            @foreach ($lokasiPenugasan as $lokasiPenugasan)
                                <option value="{{ $lokasiPenugasan->id }}"
                                    {{ isset($jadwalPembelajaran) && $jadwalPembelajaran->lokasi_penugasan_id == $lokasiPenugasan->id ? 'selected' : '' }}>
                                    {{ $lokasiPenugasan->lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    @isset($jadwalPembelajaran)
                        @php
                            $start = \Carbon\Carbon::parse($jadwalPembelajaran->mingguPembelajaran->tanggal_mulai);
                            $end = \Carbon\Carbon::parse($jadwalPembelajaran->mingguPembelajaran->tanggal_berakhir);
                        @endphp
                        <div class="form-group">
                            <label for="tanggal_pembelajaran">Tanggal Pembelajaran Minggu
                                {{ $jadwalPembelajaran->minggu_pembelajaran_id }} ({{ $start->format('d/m/Y') }} -
                                {{ $end->format('d/m/Y') }})</label>
                            <input type="date" name="tanggal_pembelajaran" id="tanggal_pembelajaran" class="form-control"
                                value="{{ old('tanggal_pembelajaran', $jadwalPembelajaran->tanggal_pembelajaran) }}"
                                min="{{ $start->format('Y-m-d') }}" max="{{ $end->format('Y-m-d') }}"
                                onchange="updateHariPembelajaran()">
                        </div>
                    @endisset

                    <div class="form-group">
                        <label for="hari_pembelajaran">Hari Pembelajaran</label>
                        <input type="text" name="hari_pembelajaran" id="hari_pembelajaran" class="form-control"
                            value="{{ isset($jadwalPembelajaran) ? $jadwalPembelajaran->hari_pembelajaran : '' }}" readonly>
                    </div>

                    <script>
                        function updateHariPembelajaran() {
                            var tanggalPembelajaran = document.getElementById('tanggal_pembelajaran').value;
                            var date = new Date(tanggalPembelajaran);
                            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            var hariPembelajaran = days[date.getDay()];
                            document.getElementById('hari_pembelajaran').value = hariPembelajaran;
                        }
                    </script>

                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control"
                            value="{{ isset($jadwalPembelajaran) ? $jadwalPembelajaran->jam_mulai : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control"
                            value="{{ isset($jadwalPembelajaran) ? $jadwalPembelajaran->jam_selesai : '' }}">
                    </div>
                    <button type="submit"
                        class="btn btn-primary">{{ isset($jadwalPembelajaran) ? 'Simpan Perubahan' : 'Tambahkan' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
