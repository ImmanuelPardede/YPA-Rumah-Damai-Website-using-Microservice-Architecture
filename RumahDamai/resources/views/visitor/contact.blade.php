@extends('layouts.visitors.master')

@section('content')

<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h1 class="text-white">Hubungi Kami</h1>
            </div>

        </div>
    </div>
</section>


<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Rumah Damai</h2>

                    <div class="contact-image-wrap d-flex flex-wrap">
                        <div class="d-flex flex-column justify-content-center ">
                            <p class="mb-0">Lumban Silintong, Balige</p>
                            <p class="mb-0"><strong>Anak Dipesisir Danau Toba</strong></p>
                            <p class="mb-0">Dengan Jumlah Anak Sebannyak <strong>{{-- {{$anaktepi}} --}}</strong></p>
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
                <div class="custom-form contact-form">
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
                <div class="custom-form contact-form">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7974.615583109242!2d98.37969714021001!3d2.032667991796157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302fb1452f5800a3%3A0x5372da394b48ff8b!2sSawah%20Lamo%2C%20Kec.%20Andam%20Dewi%2C%20Kabupaten%20Tapanuli%20Tengah%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1713617406871!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>



            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Rumah Damai</h2>

                    <div class="contact-image-wrap d-flex flex-wrap">
                        <div class="d-flex flex-column justify-content-center ">
                            <p class="mb-0">Sawah Lamo, Andam Dewi, Tapteng</p>
                            <p class="mb-0"><strong>Anak Berkebutuhan Khusus</strong></p>
                            <p class="mb-0">Dengan Jumlah Anak Sebannyak <strong>{{-- {{$anakdisabilitas}} --}}</strong></p>
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