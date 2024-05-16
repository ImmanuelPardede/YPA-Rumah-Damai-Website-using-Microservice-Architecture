@extends('layouts.visitors.master')

@section('content')

<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h1 class="text-white">Program Kami</h1>
            </div>

        </div>
    </div>
</section>


<section class="about-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-7 col-12">
                <div class="custom-text-block-custom">
                    <h3 class="mb-0">Program Yayasan Pendidikan Anak Rumah Damai</h3>
                    <ul>
                @foreach ($detailPrograms as $index => $detail)
                        <li>{{ $detail->jenis_program }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>

    @foreach ($programs as $index => $program)
            <div class="col-lg-6 col-md-5 col-12 ">
                <img src="{!! $program->img_program !!}"
                    class="about-image ms-lg-auto bg-light shadow-lg img-fluid cursor-pointer img-with-shadow" alt="">
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <h2 class="text-center">BIDANG PELAYANAN YPA RUMAH DAMAI</h2>
        <div class="row">
            @foreach ($detailPrograms as $index => $detail)

            <div class="col-lg-4 col-12">
                <div class="custom-text-box cursor-pointer img-with-shadow">
                    <h4 class="mb-2">{{ $detail->jenis_program }}</h4>
                    <p class="mb-0">{{ $detail->deskripsi }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<section class="section-padding" id="section_2">
    <div class="container">
        <h5 class="text-center mb-5">Berdasarkan Visi Misi serta {{ $totalProgram }} Bidang
            pelayanan, Maka YPA Rumah Damai
            menerapkan melalui kelas,</h5>
        <div class="row">
            <div class="row justify-content-center"> <!-- Memusatkan baris -->

            <div class="col-lg-8 col-12">
                <div class="custom-text-box-costum cursor-pointer img-with-shadow">
                    @foreach ($programs as $index => $program)

                    <p class="mb-2 ">{!! $program->kelas !!}</p>
            @endforeach

                </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection
