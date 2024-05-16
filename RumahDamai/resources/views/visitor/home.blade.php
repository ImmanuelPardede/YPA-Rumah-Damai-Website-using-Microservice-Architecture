@extends('layouts.visitors.master')

@section('content')

<section class="hero-section hero-section-full-height">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 p-0">
                @if(empty($carousel))
                <div class="hero-section hero-section-full-height d-flex justify-content-center align-items-center">
                    <div class="marquee">
                        <h1 class="text-center">Server bermasalah</h1>
                    </div>                
            </div>
                @else
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($carousel as $item)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                @if(isset($item['image']))
                                    <img src="{{ Storage::url($item['image']) }}" class="carousel-image img-fluid">
                                @endif
                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>{{ $item['title'] }}</h1>
                                    <p>{{ $item['subtitle'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if(count($carousel) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>





<section class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12 text-center mx-auto">
                <h2 class="mb-5">Yayasan Pendidikan Anak <br>
                Rumah Damai</h2>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="featured-block d-flex justify-content-center align-items-center">
                    <a class="d-block">
                        <img src="{{ asset('kind/images/icons/hands.png')}}" class="featured-block-image img-fluid" alt="">
                        
                        <p class="featured-block-text">Kesehatan Jasmani dan Rohani</p>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                <div class="featured-block d-flex justify-content-center align-items-center">
                    <a class="d-block">
                        <img src="{{ asset('kind/images/icons/heart.png')}}" class="featured-block-image img-fluid" alt="">

                        <p class="featured-block-text">Kelestarian Lingkungan</p>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                <div class="featured-block d-flex justify-content-center align-items-center">
                    <a class="d-block">
                        <img src="{{ asset('kind/images/icons/receive.png')}}" class="featured-block-image img-fluid" alt="">

                        <p class="featured-block-text">Kelestarian Budaya Lokal</p>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="featured-block d-flex justify-content-center align-items-center">
                    <a class="d-block">
                        <img src="{{ asset('kind/images/icons/scholarship.png')}}" class="featured-block-image img-fluid" alt="">

                        <p class="featured-block-text">Kesumbangan Seadanya</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <div class="row">
            @if(empty($history))
                <div class="col-12">
                    <div class="marquee">
                        <h1 class="text-center">Server bermasalah</h1>
                    </div>   
                </div>
            @else
                @foreach($history as $oke)
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    @if(isset($oke['image']))
                        <img src="{{ Storage::url($oke['image']) }}" class="custom-text-box-image img-fluid cursor-pointer img-with-shadow">
                    @endif
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-text-box cursor-pointer img-with-shadow">
                        <h2 class="mb-2">Singkatnya,</h2>

                        <h5 class="mb-3">Yayasan Pendidikan Anak Rumah Damai</h5>

                        <p class="mb-0">{{$oke['sejarah']}}</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 ">
                            <div class="custom-text-box mb-lg-0 cursor-pointer img-with-shadow">
                                <h5 class="mb-3">Tujuan Utama Kami</h5>

                                <p>{{ $oke['tujuan']}}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0 cursor-pointer img-with-shadow">
                                <div class="counter-thumb">
                                    <div class="d-flex">
                                        <span class="counter-number" >{{ $oke['dibangun'] }}</span>
                                        <span class="counter-number-text"></span>
                                    </div>

                                    <span class="counter-text">Dibuat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


<section class="news-section section-padding" id="section_5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 mb-5">
                <h2>Berita Terkini</h2>
            </div>

            <div class="col-lg-7 col-12">
                <div class="news-block">
                    @if(empty($berita))
                    <div class="marquee">
                        <h1 class="text-center">Server bermasalah</h1>
                    </div>                       
                    @else
                        @foreach($berita as $item)
                            <div class="news-block-top">
                                <a href="{{ route('news.detail', ['id' => $item['ID']]) }}">
                                    @if(isset($item['image']))
                                        <img src="{{ Storage::url($item['image']) }}" class="news-image img-fluid">
                                    @endif
                                </a>

                                <div class="news-category-block">
                                    <a href="{{ route('news.detail', ['id' => $item['ID']]) }}" class="category-block-link">
                                        @foreach($category as $key => $value)
                                            {{$value['name'] }}
                                        @endforeach
                                    </a>
                                </div> 
                            </div>

                            <div class="news-block-info">
                                <div class="d-flex mt-2">
                                    <div class="news-block-date">
                                        <p>
                                            <i class="bi-calendar4 custom-icon me-1"></i>
                                            {{ date('Y-m-d', strtotime($item['UpdatedAt'])) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="news-block-title mb-2">
                                    <h4><a href="{{ route('news.detail', ['id' => $item['ID']]) }}" class="news-block-title-link">{{$item['judul'] }}</a></h4>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-4 col-12 mx-auto">
                <form class="custom-form search-form" action="#" method="post" role="form">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button type="submit" class="form-control">
                        <i class="bi-search"></i>
                    </button>
                </form>

                <h5 class="mt-5 mb-3">Berita Lainnya</h5>
                @if(empty($berita))
                <div class="marquee">
                    <h1 class="text-center">Server bermasalah</h1>
                </div>                   
                @else
                    @foreach($berita as $item)
                        <div class="news-block news-block-two-col d-flex mt-4">
                            <div class="news-block-two-col-image-wrap">
                                <a href="{{ route('news.detail', ['id' => $item['ID']]) }}">
                                    @if(isset($item['image']))
                                        <img src="{{ Storage::url($item['image']) }}" class="news-image img-fluid">
                                    @endif  
                                </a>
                            </div>

                            <div class="news-block-two-col-info">
                                <div class="news-block-title mb-2">
                                    <h6><a href="{{ route('news.detail', ['id' => $item['ID']]) }}" class="news-block-title-link">{{$item['judul']}}</a></h6>
                                </div>

                                <div class="news-block-date">
                                    <p>
                                        <i class="bi-calendar4 custom-icon me-1"></i>
                                        {{ date('Y-m-d', strtotime($item['UpdatedAt'])) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="tags-block">
                    <h5 class="mb-3">Kategori</h5>
                    @if(empty($category))
                    <div class="marquee">
                        <h1 class="text-center">Server bermasalah</h1>
                    </div>                       
                    @else
                        @foreach($category as $item)
                            <a class="tags-block-link" disabled>
                                {{ $item['name'] }}
                            </a>
                        @endforeach
                    @endif
                </div> 
            </div>
        </div>
    </div>
</section>






<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0 ">
                <div class="contact-info-wrap">
                    <h2>Rumah Damai</h2>

                    <div class="contact-image-wrap d-flex flex-wrap">
                        <div class="d-flex flex-column justify-content-center ">
                            <p class="mb-0">Lumban Silintong, Balige</p>
                            <p class="mb-0"><strong>Anak Dipesisir Danau Toba</strong></p>
                            <p class="mb-0">Dengan Jumlah Anak Sebannyak <strong>{{$anaktepi}}</strong></p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <h5 class="mb-3">Informasi Kontak</h5>

                        <p class="d-flex mb-2">
                            <i class="bi-geo-alt me-2"></i>
                            Lumban Silintong, Balige, Toba, Sumatra Utara
                        </p>

                        <p class="d-flex mb-2">
                            <i class="bi-telephone me-2"></i>

                            <a href="tel: 305-240-9671">
                                081262945602
                            </a>
                        </p>

                        <p class="d-flex">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@yourgmail.com">
                                yparumahdamai@gmail.com
                            </a>
                        </p>

{{--                         <a href="#" class="custom-btn btn mt-3">Get Direction</a>
 --}}                    </div>
                </div>
            </div>

<style>
    /* Gaya untuk membuat iframe responsif */
.custom-form iframe {
    width: 100%; /* Lebar penuh */
    height: 450px; /* Tinggi tetap */
}

@media (max-width: 767px) {
    .custom-form iframe {
        height: 300px; /* Tinggi lebih pendek untuk mode mobile */
    }
}

</style>

            <div class="col-lg-5 col-12 mx-auto">
                <div class="custom-form contact-form cursor-pointer img-with-shadow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d31891.808995458618!2d99.02334569240283!3d2.345348277141445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d2.3487009057448573!2d99.04222710238747!5e0!3m2!1sid!2sid!4v1713616037570!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
    </div>
</section>


<hr>

<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">
<style>
    /* Gaya untuk membuat iframe responsif */
.custom-form iframe {
    width: 100%; /* Lebar penuh */
    height: 400px; /* Tinggi tetap */
}

@media (max-width: 767px) {
    .custom-form iframe {
        height: 300px; /* Tinggi lebih pendek untuk mode mobile */
    }
}

</style>
            <div class="col-lg-5 col-12 mx-auto">
                <div class="custom-form contact-form cursor-pointer img-with-shadow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7974.615583109242!2d98.37969714021001!3d2.032667991796157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302fb1452f5800a3%3A0x5372da394b48ff8b!2sSawah%20Lamo%2C%20Kec.%20Andam%20Dewi%2C%20Kabupaten%20Tapanuli%20Tengah%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1713617406871!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>



            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Rumah Damai</h2>

                    <div class="contact-image-wrap d-flex flex-wrap">
                        <div class="d-flex flex-column justify-content-center ">
                            <p class="mb-0">Sawah Lamo, Andam Dewi, Tapteng</p>
                            <p class="mb-0"><strong>Anak Berkebutuhan Khusus</strong></p>
                            <p class="mb-0">Dengan Jumlah Anak Sebannyak <strong>{{$anakdisabilitas}}</strong></p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <h5 class="mb-3">Informasi Kontak</h5>

                        <p class="d-flex mb-2">
                            <i class="bi-geo-alt me-2"></i>
                            Sawah Lamo, Andam Dewi, Tapteng, Sumatra Utara
                        </p>

                        <p class="d-flex mb-2">
                            <i class="bi-telephone me-2"></i>

                            <a href="tel: 305-240-9671">
                                081262945602
                            </a>
                        </p>

                        <p class="d-flex">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@yourgmail.com">
                                yparumahdamai@gmail.com
                            </a>
                        </p>

{{--                         <a href="#" class="custom-btn btn mt-3">Get Direction</a>
 --}}                    </div>
                </div>
            </div>
    </div>

    
</section>



@endsection
