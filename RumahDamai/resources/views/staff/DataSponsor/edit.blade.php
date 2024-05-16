    @extends('layouts.management.master')

    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Edit Data Sponsor</h1>

                    <p><strong>Foto Sponsor</strong></p>
                    @if ($sponsor->foto_sponsor)
                            <img src="{{ asset($sponsor->foto_sponsor) }}" alt="Foto Sponsor" class="img-fluid">
                            <strong>Foto Sponsor</strong> {{ $sponsor->foto_sponsor }}
                        @else
                            <p>Tidak ada foto Sponsor.</p>
                        @endif

                    <form action="{{ route('dataSponsor.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="foto_sponsor">Foto Sponsor Baru</label>
                            <input type="file" class="form-control" id="foto_sponsor" name="foto_sponsor">
                        </div>

                        <div class="form-group">
                            <label for="sponsorship_id">Jenis Sponsorship</label>
                            <select class="form-control js-example-basic-single" id="sponsorship_id" name="sponsorship_id[]" multiple required>
                                @foreach ($sponsorship as $sponsorshipItem)
                                    <option value="{{ $sponsorshipItem->id }}" {{ $sponsor->sponsorship->contains($sponsorshipItem->id) ? 'selected' : '' }}>{{ $sponsorshipItem->jenis_sponsorship }}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="nama_sponsor">Nama Sponsor</label>
                            <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor"
                                value="{{ $sponsor->nama_sponsor }}">
                        </div>

                        <div class="form-group">
                            <label for="email_sponsor">Email Donatur</label>
                            <input type="text" class="form-control" id="email_sponsor" name="email_sponsor"
                                value="{{ $sponsor->email_sponsor }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_sponsor">Tanggal Sponsor</label>
                            <input type="date" class="form-control" id="tanggal_sponsor" name="tanggal_sponsor"
                                value="{{ $sponsor->tanggal_sponsor }}">
                        </div>

                        <div class="form-group">
                            <label for="no_telepon_sponsor">No. Hp Sponsor</label>
                            <input type="text" class="form-control" id="no_telepon_sponsor" name="no_telepon_sponsor"
                                value="{{ $sponsor->no_telepon_sponsor }}">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{ $sponsor->deskripsi }}">
                        </div>

                        <div class="form-group">
                            <label for="jumlah_sponsor">Jumlah Sponsor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="height: 86%;">Rp</span>
                                </div>
                                <input type="text" class="form-control" id="jumlah_sponsor" name="jumlah_sponsor"
                                    value="{{ isset($sponsor->jumlah_sponsor) ? $sponsor->jumlah_sponsor : '' }}">
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
