@extends('layouts.management.master')

@section('content')
    <div class="container">
        <h2>Create Raport</h2>
        <form action="{{ route('raport.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="anak_id">Nama Anak <span style="color: red">*</label>
                <select class="form-control js-example-basic-single" id="anak_id" name="anak_id" required>
                    <option value="" disabled selected>-- Nama Anak --</option>
                    @foreach ($anak as $anakItem)
                        <option value="{{ $anakItem->id }}">{{ $anakItem->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="periode_bulan">Periode Bulan <span style="color: red">*</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="periode_awal" placeholder="Bulan Awal" required>
                    <div class="input-group-prepend input-group-append">
                        <span class="input-group-text">-</span>
                    </div>
                    <input type="text" class="form-control" name="periode_akhir" placeholder="Bulan Akhir" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun <span style="color: red">*</label>
                <input type="text" class="form-control" id="tahun" name="tahun" required>
                <small id="tahunHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="area">Area<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="area[]" required>
            </div>
            <div class="form-group">
                <label for="kemampuan">Kemampuan<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="kemampuan[]" required>
            </div>
            <div class="form-group">
                <label for="kelas_kemampuan">Kelas Kemampuan<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="kelas_kemampuan[]" required>
            </div>
            <div class="form-group">
                <label for="naratif">Naratif<span style="color: red">*</span></label>
                <textarea class="form-control" name="naratif[]" required></textarea>
            </div>

            <a href="#" class="addraport btn btn-primary" style="float: right">Tambah Detail</a>
            <div class="raport"></div>

            <button type="submit" class="btn btn-primary">Submit</button>
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

    <script>
        document.getElementById('tahun').addEventListener('input', function() {
            var tahunInput = this.value;
            var tahunPattern = /^[0-9]{4}$/;

            if (tahunPattern.test(tahunInput)) {
                document.getElementById('tahunHelp').textContent = '';
                this.setCustomValidity('');
            } else {
                document.getElementById('tahunHelp').textContent = 'Masukkan tahun yang valid (contoh: 2024)';
                this.setCustomValidity('Masukkan tahun yang valid (contoh: 2024)');
            }
        });

        document.getElementById('tahun').addEventListener('change', function() {
            if (!this.validity.valid) {
                this.value = ''; // Mengosongkan nilai input jika tidak valid
                document.getElementById('tahunHelp').textContent = 'Masukkan tahun yang valid (contoh: 2024)';
            }
        });
    </script>
@endsection
