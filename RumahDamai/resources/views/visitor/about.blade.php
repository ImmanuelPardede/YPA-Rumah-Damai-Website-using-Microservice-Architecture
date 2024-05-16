@extends('layouts.visitors.master')

@section('content')


<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h1 class="text-white">Tentang Kami</h1>
            </div>

        </div>
    </div>
</section>

@foreach($abouts as $item)

<section class="about-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-5 col-12">
                <img src="{{ asset($item->img_yayasan) }}"
                    class="about-image ms-lg-auto bg-light shadow-lg img-fluid cursor-pointer img-with-shadow" alt="">
            </div>

            <div class="col-lg-6 col-md-7 col-12">
                <div class="custom-text-block-custom">
                    <h3 class="mb-0">Yayasan Pendidikan Anak Rumah Damai</h3>
                    <p>{{ $item->latar_belakang }}</p>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <h2 class="text-center">Visi & Misi</h2>
        <div class="row">

            <div class="col-lg-6 col-12">
                <div class="custom-text-box cursor-pointer img-with-shadow">
                    <h4 class="mb-2">Visi</h4>
                    <p class="mb-0">{{ $item->visi }}</p>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="custom-text-box cursor-pointer img-with-shadow">
                    <h4 class="mb-2">Misi</h4>
                    <p class="mb-0">{!! $item->misi !!}</p>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="section-padding " id="section_2">
    <div class="container">
        <h5 class="text-center mb-5" style="color: var(--secondary-color);">Saat ini YPA Rumah Damai berada di 2 Wilayah,</h5>
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 ">
                        <div class="custom-text-box-costum mb-lg-0">
                            <h5 class="mb-3">Wilayah I</h5>

                            <p>D{{ $item->wilayah1 }}</p>

                            <img src="{{ asset($item->img_wilayah2) }}"
                    class="about-image ms-lg-auto bg-light shadow-lg img-fluid cursor-pointer img-with-shadow" alt="">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box-costum mb-lg-0">
                            <h5 class="mb-3">Wilayah II</h5>

                            <p>{{ $item->wilayah2 }}
                                </p>

                            <img src="{{ asset($item->img_wilayah1) }}"
                    class="about-image ms-lg-auto bg-light shadow-lg img-fluid cursor-pointer img-with-shadow" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endforeach



@endsection
