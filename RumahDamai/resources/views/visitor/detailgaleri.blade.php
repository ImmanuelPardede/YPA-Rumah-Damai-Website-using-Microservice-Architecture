@extends('layouts.visitors.master')

@section('content')




{{-- untuk detailnya  --}}


<section class="news-detail-header-section text-center">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h1 class="text-white">{{ $galeri->judul }}</h1>
            </div>

        </div>
    </div>
</section>



<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            @foreach($galeri->detailgaleri as $detail)
            <div class="col-lg-3 col-12 py-4">
                <a href="{{ asset($detail->img_galeri) }}" data-fancybox="images" data-caption="{{ $galeri->judul }}">
                    <img src="{{ asset($detail->img_galeri) }}" class="news-image img-fluid cursor-pointer img-with-shadow rounded" alt="" style="width: 900px; height: 200px; object-fit: cover;">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<script>
    // Initialize FancyBox
    $(document).ready(function() {
        $("[data-fancybox='images']").fancybox({
            animationEffect: "fade",
            transitionEffect: "slide",
            transitionDuration: 800,
            loop: true,
            protect: true,
            buttons: [
                'close',
                'zoom'
            ],
            caption: function(instance, item) {
                return $(this).data('caption');
            }
        });
    });
</script>


@endsection