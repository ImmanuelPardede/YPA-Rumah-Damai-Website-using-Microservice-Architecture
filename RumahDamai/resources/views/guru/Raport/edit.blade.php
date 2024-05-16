@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Edit Raport</h2>
        <form action="{{ route('raport.update', $raport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="anak_id">Nama Anak</label>
                <select class="form-control js-example-basic-single" id="anak_id" name="anak_id" required>
                    <option value="" disabled>-- Nama Anak --</option>
                    @foreach ($anak as $anakItem)
                        <option value="{{ $anakItem->id }}" {{ $anakItem->id == $raport->anak_id ? 'selected' : '' }}>
                            {{ $anakItem->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="periode_bulan">Periode Bulan:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="periode_awal" placeholder="Bulan Awal"
                        value="{{ $periode_awal }}" required>
                    <div class="input-group-prepend input-group-append">
                        <span class="input-group-text">-</span>
                    </div>
                    <input type="text" class="form-control" name="periode_akhir" placeholder="Bulan Akhir"
                        value="{{ $periode_akhir }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" name="tahun" value="{{ $raport->tahun }}" required>
            </div>
            @foreach ($detailraports as $detailraport)
                <div class="form-group">
                    <label for="area">Area:</label>
                    <input type="text" class="form-control" name="area[]" value="{{ $detailraport->area }}" required>
                </div>
                <div class="form-group">
                    <label for="kemampuan">Kemampuan:</label>
                    <input type="text" class="form-control" name="kemampuan[]" value="{{ $detailraport->kemampuan }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="kelas_kemampuan">Kelas Kemampuan:</label>
                    <input type="text" class="form-control" name="kelas_kemampuan[]"
                        value="{{ $detailraport->kelas_kemampuan }}" required>
                </div>
                <div class="form-group">
                    <label for="naratif">Naratif:</label>
                    <textarea class="form-control" name="naratif[]" required>{{ $detailraport->naratif }}</textarea>
                </div>
            @endforeach

            <a href="#" class="addraport btn btn-primary" style="float: right">Tambah Detail</a>

            <div class="raport"></div>

            <button type="submit" id="submitButton" class="btn btn-primary mr-2"
                onclick="handleUpdatedConfirmation(event)">Perbarui</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        // Event listener untuk tombol "Tambah Detail"
        $('.addraport').on('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link
            addraport();
        });

        // Fungsi untuk menambahkan detail raport
        function addraport() {
            var raport =
                '<div><div class="form-group"><label for="area">Area:</label><input type="text" class="form-control" name="area[]" required></div><div class="form-group"><label for="kemampuan">Kemampuan:</label><input type="text" class="form-control" name="kemampuan[]" required></div><div class="form-group"><label for="kelas_kemampuan">Kelas Kemampuan:</label><input type="text" class="form-control" name="kelas_kemampuan[]" required></div><div class="form-group"><label for="naratif">Naratif:</label><textarea class="form-control" name="naratif[]" required></textarea></div><a href="#" class="remove btn btn-danger" style="float: right">Hapus</a></div>';
            $('.raport').append(raport);
        };

        // Event listener untuk tombol "Hapus"
        $(document).on('click', '.remove', function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link
            $(this).parent().remove();
        });
    </script>
@endsection
