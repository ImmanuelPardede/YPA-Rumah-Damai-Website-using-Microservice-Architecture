@extends('layouts.visitors.master')

@section('content')

<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h1 class="text-white">Fasilitas Kami</h1>
            </div>

        </div>
    </div>
</section>

<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            @foreach($fasilitas as $item)
            <div class="col-lg-6 col-md-5 col-12 ">
                <div id="carouselExampleIndicators" class="carousel slide cursor-pointer img-with-shadow" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($item->detailFasilitas->slice(0, 3) as $index => $detailFasilitas)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset($detailFasilitas->img_fasilitas) }}" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 col-md-7 col-12">
                    <div class="custom-text-box-costum cursor-pointer img-with-shadow">
                        <h3 class="mb-0">Fasilitas Rumah Damai</h3>
                        <p>{!! $item->fasilitas !!}</p>
                    </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

@endsection