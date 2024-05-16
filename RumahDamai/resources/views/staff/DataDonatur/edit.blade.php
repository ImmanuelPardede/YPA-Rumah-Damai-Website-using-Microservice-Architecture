    @extends('layouts.management.master')

    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Edit Data Donatur</h1>

                    <p><strong>Foto Donatur</strong></p>
                    @if ($donatur->foto_donatur)
                        <img src="{{ asset($donatur->foto_donatur) }}" alt="Foto Donatur" class="img-fluid">
                        <strong>Foto Donasi</strong> {{ $donatur->foto_donatur }}
                    @else
                        <p>Tidak ada foto Donatur.</p>
                    @endif

                    <form action="{{ route('dataDonatur.update', $donatur->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="foto_donatur">Foto Donasi Baru</label>
                            <input type="file" class="form-control" id="foto_donatur" name="foto_donatur">
                        </div>

                        <div class="form-group">
                            <label for="donasi_id">Jenis Donasi</label>
                            <select class="form-control js-example-basic-single" id="donasi_id" name="donasi_id[]" multiple
                                required>
                                @foreach ($donasi as $donasiItem)
                                    <option value="{{ $donasiItem->id }}"
                                        {{ $donatur->donasi->contains($donasiItem->id) ? 'selected' : '' }}>
                                        {{ $donasiItem->jenis_donasi }}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="nama_donatur">Nama Donatur</label>
                            <input type="text" class="form-control" id="nama_donatur" name="nama_donatur"
                                value="{{ $donatur->nama_donatur }}">
                        </div>

                        <div class="form-group">
                            <label for="email_donatur">Email Donatur</label>
                            <input type="text" class="form-control" id="email_donatur" name="email_donatur"
                                value="{{ $donatur->email_donatur }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_donatur">Tanggal Donasi</label>
                            <input type="date" class="form-control" id="tanggal_donatur" name="tanggal_donatur"
                                value="{{ $donatur->tanggal_donatur }}">
                        </div>

                        <div class="form-group">
                            <label for="no_hp_donatur">No. Hp Donatur</label>
                            <input type="text" class="form-control" id="no_hp_donatur" name="no_hp_donatur"
                                value="{{ $donatur->no_hp_donatur }}">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{ $donatur->deskripsi }}">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_donasi">Jumlah Donasi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="height: 86%;">Rp</span>
                                </div>
                                <input type="text" class="form-control" id="jumlah_donasi" name="jumlah_donasi"
                                    value="{{ isset($donatur->jumlah_donasi) ? $donatur->jumlah_donasi : '' }}">
                            </div>
                        </div>


                        <a href="{{ url()->previous() }}" class="btn btn-primary">Batal</a>
                        <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                            onclick="handleUpdatedConfirmation(event)">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
