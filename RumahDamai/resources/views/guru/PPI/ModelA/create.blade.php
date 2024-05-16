@extends('layouts.management.master')

@section('content')
<<<<<<< Updated upstream
<div class="container">
    <h2>Create PPI and Detail PPI</h2>
    <form action="{{ route('PPI.ModelA.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="anak_id">Nama Anak <span style="color: red">*</span></label>
            <select class="form-control js-example-basic-single" id="anak_id" name="anak_id" >
                <option value="" disabled selected>-- Pilih Nama Anak --</option>
                @foreach ($anak as $anakItem)
                <option value="{{ $anakItem->id }}">{{ $anakItem->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>


        <div class="mb-3">
            <label for="gambaran_sensory" class="form-label">Gambaran Sensory<span style="color: red">*</span></label>
            <textarea id="editor1" class="form-control @error('gambaran_sensory') is-invalid @enderror" name="gambaran_sensory[]" required autocomplete="gambaran_sensory">
                <ul>
                    <li>..</li>
                </ul>
                {{ old('gambaran_sensory') }}
            </textarea>
            @error('gambaran_sensory')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="data_medis" class="form-label">Data Medis<span style="color: red">*</span></label>
            <textarea id="editor2" class="form-control @error('data_medis') is-invalid @enderror" name="data_medis[]" required autocomplete="data_medis">
                <ul>
                    <li>..</li>
                </ul>
                {{ old('data_medis') }}
            </textarea>
            @error('data_medis')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        
        <div class="mb-3">
            <label for="hal_disukai" class="form-label">Soskom<span style="color: red">*</span></label>
            <textarea id="editor3" class="form-control @error('hal_disukai') is-invalid @enderror" name="hal_disukai[]" required autocomplete="hal_disukai">
                <ul>
                    <li>..</li>
                </ul>
                {{ old('hal_disukai') }}
            </textarea>
            @error('hal_disukai')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kondisi_lain" class="form-label">kondisi_lain<span style="color: red">*</span></label>
            <textarea id="editor4" class="form-control @error('kondisi_lain') is-invalid @enderror" name="kondisi_lain[]" required autocomplete="kondisi_lain">
                <ul>
                    <li>..</li>
                </ul>
                {{ old('kondisi_lain') }}
            </textarea>
            @error('kondisi_lain')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


      <div class="form-group row">
=======
    <div class="container">
        <h2>Create PPI and Detail PPI</h2>
        <form action="{{ route('PPI.ModelA.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="anak_id">Nama Anak <span style="color: red">*</span></label>
                <select class="form-control js-example-basic-single" id="anak_id" name="anak_id">
                    <option value="" disabled selected>-- Pilih Nama Anak --</option>
                    @foreach ($anak as $anakItem)
                        <option value="{{ $anakItem->id }}">{{ $anakItem->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="gambaran_sensory">Gambaran Sensory <span style="color: red">*</span></label>
                <input type="text" class="form-control" id="gambaran_sensory" name="gambaran_sensory[]">
                <div class="gambaran">
                </div>
                <a href="#" class="add-gambaran btn btn-primary mt-3">Tambah Gambar</a>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
                    // Event listener untuk tombol "Tambah Detail"
                    $('.add-gambaran').on('click', function(event) {
                        event.preventDefault(); // Mencegah perilaku default dari link
                        addgambaran();
                    });

                    // Fungsi untuk menambahkan detail gambaran
                    function addgambaran() {
                        var gambaran = `
                        <hr>
                        <div class="form-group">
                            <label for="gambaran_sensory">gambaran_sensory:</label>
                            <input type="text" class="form-control" name="gambaran_sensory[]" >
                            <a href="#" class="remove-gambaran btn btn-danger" >Hapus</a>
                        </div>
                    `;
                        $('.gambaran').append(gambaran);
                    }

                    // Event listener untuk tombol "Hapus"
                    $(document).on('click', '.remove-gambaran', function(event) {
                        event.preventDefault(); // Mencegah perilaku default dari link
                        $(this).parent().remove();
                    });
                });
            </script>

            <div class="form-group">
                <label for="data_medis">Data Medis <span style="color: red">*</span></label>
                <input type="text" class="form-control" id="data_medis" name="data_medis[]">
                <div class="medis">
                </div>
                <a href="#" class="add-medis btn btn-primary mt-3">Tambah Gambar</a>
            </div>

            <script>
                $(document).ready(function() {
                    // Event listener untuk tombol "Tambah Detail"
                    $('.add-medis').on('click', function(event) {
                        event.preventDefault();
                        addmedis();
                    });


                    // Fungsi untuk menambahkan detail medis
                    function addmedis() {
                        var medis = `
                        <hr>
                        <div class="form-group">
                            <label for="data_medis">data_medis:</label>
                            <input type="text" class="form-control" name="data_medis[]" >
                            <a href="#" class="remove-medis btn btn-danger" >Hapus</a>
                        </div>
                    `;
                        $('.medis').append(medis);
                    }


                    // Event listener untuk tombol "Hapus"
                    $(document).on('click', '.remove-medis', function(event) {
                        event.preventDefault();
                        $(this).parent().remove();
                    });

                });
            </script>

            <div class="form-group">
                <label for="hal_disukai">Hal yang Disukai <span style="color: red">*</span></label>
                <input type="text" class="form-control" id="hal_disukai" name="hal_disukai[]">
                <div class="disukai">
                </div>
                <a href="#" class="add-disukai btn btn-primary mt-3">Tambah disukai</a>
            </div>

            <script>
                $(document).ready(function() {
                    // Event listener untuk tombol "Tambah Detail"
                    $('.add-disukai').on('click', function(event) {
                        event.preventDefault();
                        adddisukai();
                    });


                    // Fungsi untuk menambahkan detail disukai
                    function adddisukai() {
                        var disukai = `
                        <hr>
                        <div class="form-group">
                            <label for="hal_disukai">hal_disukai:</label>
                            <input type="text" class="form-control" name="hal_disukai[]" >
                            <a href="#" class="remove-disukai btn btn-danger" >Hapus</a>
                        </div>
                    `;
                        $('.disukai').append(disukai);
                    }


                    // Event listener untuk tombol "Hapus"
                    $(document).on('click', '.remove-disukai', function(event) {
                        event.preventDefault();
                        $(this).parent().remove();
                    });

                });
            </script>

            <div class="form-group">
                <label for="kondisi_lain">Kondisi Lain <span style="color: red">*</span></label>
                <input type="text" class="form-control" id="kondisi_lain" name="kondisi_lain[]">
                <div class="kondisi">
                </div>
                <a href="#" class="add-kondisi btn btn-primary mt-3">Tambah kondisi</a>
            </div>

            <script>
                $(document).ready(function() {
                    // Event listener untuk tombol "Tambah Detail"
                    $('.add-kondisi').on('click', function(event) {
                        event.preventDefault();
                        addkondisi();
                    });


                    // Fungsi untuk menambahkan detail kondisi
                    function addkondisi() {
                        var kondisi = `
                        <hr>
                        <div class="form-group">
                            <label for="kondisi_lain">kondisi_lain:</label>
                            <input type="text" class="form-control" name="kondisi_lain[]" >
                            <a href="#" class="remove-kondisi btn btn-danger" >Hapus</a>
                        </div>
                    `;
                        $('.kondisi').append(kondisi);
                    }


                    // Event listener untuk tombol "Hapus"
                    $(document).on('click', '.remove-kondisi', function(event) {
                        event.preventDefault();
                        $(this).parent().remove();
                    });

                });
            </script>

            <hr>
            {{--  <div class="form-group row">
>>>>>>> Stashed changes

<div class="col-md-6">
        <div class="form-group">
            <label for="jangka">Tujuan Jangka:</label>
            <input type="text" class="form-control" id="jangka" name="jangka[]" value="Jangka Panjang" readonly>
        </div>

        <!-- Input untuk Jangka Panjang -->
        <div class="form-group">
            <label for="bina_diri">Bina diri:</label>
            <input type="text" class="form-control" id="bina_diri" name="bina_diri[]" >
            <div class="bina_diri">
            </div>
            <a href="#" class="add-bina_diri btn btn-primary mt-3">Tambah bina_diri</a>
        </div>

        <script>
            $(document).ready(function() {
                // Event listener untuk tombol "Tambah Detail"
                $('.add-bina_diri').on('click', function(event) {
                    event.preventDefault();
                    addbina_diri();
                });

        
                // Fungsi untuk menambahkan detail bina_diri
                function addbina_diri() {
                    var bina_diri = `
                        <hr>
                        <div class="form-group">
                            <label for="bina_diri">bina_diri:</label>
                            <input type="text" class="form-control" name="bina_diri[]" >
                            <a href="#" class="remove-bina_diri btn btn-danger" >Hapus</a>
                        </div>
                    `;
                    $('.bina_diri').append(bina_diri);
                }

        
                // Event listener untuk tombol "Hapus"
                $(document).on('click', '.remove-bina_diri', function(event) {
                event.preventDefault();
                $(this).parent().remove();
            });

            });
        </script>


        <div class="form-group">
            <label for="sosialisasi_dan_komunikasi">Sosialisasi dan Komunikasi</label>
            <input type="text" class="form-control" id="sosialisasi_dan_komunikasi" name="sosialisasi_dan_komunikasi[]" >
        </div>

        <div class="form-group">
            <label for="bekerja">bekerja</label>
            <input type="text" class="form-control" id="bekerja" name="bekerja[]" >
        </div>

        <div class="form-group">
            <label for="akademik">Akademik:</label>
            <input type="text" class="form-control" id="akademik" name="akademik[]" >
        </div>
    </div>
    <div class="col-md-6">

        <!-- Input untuk Jangka Pendek -->
        <div class="form-group">
            <label for="jangka">Tujuan Jangka Pendek:</label>
            <input type="text" class="form-control" id="jangka" name="jangka[]" value="Jangka Pendek" readonly>
        </div>

        <div class="form-group">
            <label for="bina_diri">Bina diri:</label>
            <input type="text" class="form-control" id="bina_diri" name="bina_diri[]" >
        </div>

        <div class="form-group">
            <label for="sosialisasi_dan_komunikasi">Sosialisasi dan Komunikasi</label>
            <input type="text" class="form-control" id="sosialisasi_dan_komunikasi" name="sosialisasi_dan_komunikasi[]" >
        </div>

        <div class="form-group">
            <label for="bekerja">bekerja</label>
            <input type="text" class="form-control" id="bekerja" name="bekerja[]" >
        </div>

        <div class="form-group">
            <label for="akademik">Akademik:</label>
            <input type="text" class="form-control" id="akademik" name="akademik[]" >
        </div>
    </div>
        </div>  






<<<<<<< Updated upstream
        <!-- Form untuk Tujuan -->
{{--         <div class="form-group">
            <label for="jangka">Jangka</label>
            <input type="text" class="form-control" id="jangka" name="jangka[]" >
            <div class="jangka">
=======
            <!-- Form untuk Tujuan -->
            <div class="form-group">
                <label for="jangka">Jangka</label>
                <input type="text" class="form-control" id="jangka" name="jangka[]">
                <div class="jangka">
                </div>
                <a href="#" class="add-jangka btn btn-primary mt-3">Tambah jangka</a>
>>>>>>> Stashed changes
            </div>

            <script>
                $(document).ready(function() {
                    // Event listener untuk tombol "Tambah Detail"
                    $('.add-jangka').on('click', function(event) {
                        event.preventDefault();
                        addjangka();
                    });


                    // Fungsi untuk menambahkan detail jangka
                    function addjangka() {
                        var jangka = `
                        <hr>
                        <div class="form-group">
                            <label for="jangka">jangka:</label>
                            <input type="text" class="form-control" name="jangka[]" >
                            <a href="#" class="remove-jangka btn btn-danger" >Hapus</a>
                        </div>
                    `;
<<<<<<< Updated upstream
                    $('.jangka').append(jangka);
                }

        
                // Event listener untuk tombol "Hapus"
                $(document).on('click', '.remove-jangka', function(event) {
                event.preventDefault();
                $(this).parent().remove();
            });

            });
        </script>

        <div class="form-group">
    <label for="bina_diri">Bina Diri</label>
    <input type="text" class="form-control" name="bina_diri[]" >
</div>

<div class="form-group">
    <label for="sosialisasi_dan_komunikasi">Sosialisasi dan Komunikasi</label>
    <input type="text" class="form-control" name="sosialisasi_dan_komunikasi[]" >
</div>

<div class="form-group">
    <label for="bekerja">Bekerja</label>
    <input type="text" class="form-control" name="bekerja[]" >
</div>

<div class="form-group">
    <label for="akademik">Akademik</label>
    <input type="text" class="form-control" name="akademik[]" >
</div> --}}
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
=======
                        $('.jangka').append(jangka);
                    }
>>>>>>> Stashed changes

<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor1'), {
                // Konfigurasi CKEditor 5 untuk textarea pertama
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'), {
                // Konfigurasi CKEditor 5 untuk textarea kedua
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });

            ClassicEditor
            .create(document.querySelector('#editor3'), {
                // Konfigurasi CKEditor 5 untuk textarea kedua
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });

            ClassicEditor
            .create(document.querySelector('#editor4'), {
                // Konfigurasi CKEditor 5 untuk textarea kedua
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });
            ClassicEditor
            .create(document.querySelector('#editor5'), {
                // Konfigurasi CKEditor 5 untuk textarea kedua
            })
            .catch(error => {
                console.error('Ada kesalahan saat menginisialisasi CKEditor 5:', error);
            });
    });
</script>




                    // Event listener untuk tombol "Hapus"
                    $(document).on('click', '.remove-jangka', function(event) {
                        event.preventDefault();
                        $(this).parent().remove();
                    });

                });
            </script>

            <div class="form-group">
                <label for="bina_diri">Bina Diri</label>
                <input type="text" class="form-control" name="bina_diri[]">
            </div>

            <div class="form-group">
                <label for="sosialisasi_dan_komunikasi">Sosialisasi dan Komunikasi</label>
                <input type="text" class="form-control" name="sosialisasi_dan_komunikasi[]">
            </div>

            <div class="form-group">
                <label for="bekerja">Bekerja</label>
                <input type="text" class="form-control" name="bekerja[]">
            </div>

            <div class="form-group">
                <label for="akademik">Akademik</label>
                <input type="text" class="form-control" name="akademik[]">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


