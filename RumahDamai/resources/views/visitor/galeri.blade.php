@extends('layouts.visitors.master')

@section('content')

<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h1 class="text-white">Galeri Kami</h1>
            </div>

        </div>
    </div>
</section>


<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            @if($galeri->isEmpty())
                <div class="col-lg-12 text-center">
                    <p class="text-muted">Admin masih ngantuk, mohon maklum</p>
                </div>
            @else

            @foreach($galeri as $item)
            <div class="col-lg-4 col-12">
                <div class="news-block ">
                    <div class="news-block-top cursor-pointer img-with-shadow">
                        @if ($item->detailgaleri->isNotEmpty())
                            <a href="{{ route('gallery.detail', ['id' => $item->id]) }}">
                                <img src="{{ asset($item->detailgaleri[0]->img_galeri) }}" class="news-image img-fluid" alt="">
                            </a>
                        @endif
                        <span class="position-absolute translate-middle-y badge bg-secondary" style="right: 13px; top: 20px; font-size: 14px;">
                            {{ $detailgaleriCounts[$item->id] ?? 0 }} <i class="bi-camera-fill"></i> 
                        </span>
                        <div class="news-category-block">
                            <a href="{{ route('gallery.detail', ['id' => $item->id]) }}" class="category-block-link">
                                {{ $item->judul }}
                            </a>
                        </div>
                    </div>
                    <div class="news-block-info">
                        <div class="d-flex mt-2">
                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    {{ $item->waktu }}
                                </p>
                            </div>
                            <div class="news-block-author mx-5">
                                <p>
                                    <i class="bi-person custom-icon me-1"></i>
                                    By Admin
                                </p>
                            </div>
                            <div class="news-block-comment">
                                <p>
                                    <i class="bi-geo-fill custom-icon me-1"></i>
                                    {{ $item->lokasi }}
                                </p>
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




@endsection