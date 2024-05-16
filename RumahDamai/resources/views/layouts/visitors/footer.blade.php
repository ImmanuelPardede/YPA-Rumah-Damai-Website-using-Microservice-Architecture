<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-4">
                <img src="{{ asset('skydash/images/logo.png')}}" class="logo img-fluid" alt="" style="width: 150px;">
            </div>
            
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <h5 class="site-footer-title mb-3 text-white"><strong>Akses Cepat</strong></h5>

                <ul class="footer-menu">
                    <li class="footer-menu-item">
                        @if (Auth::check())
                            <a href="/dashboard" class="footer-menu-link" target="_blank">SIAD</a>
                        @else
                            <a href="/login" class="footer-menu-link" target="_blank">SIAD</a>
                        @endif
                    </li>
                    
                    <li class="footer-menu-item"><a href="/aboutus" class="footer-menu-link">Tentang Kami</a></li>

                    <li class="footer-menu-item"><a href="/programrm" class="footer-menu-link">Program Kami</a></li>

                    <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQ</a></li>

                    <li class="footer-menu-item"><a href="#" class="footer-menu-link">Bantuan</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mx-auto">
                <h5 class="site-footer-title mb-3 text-white"><strong>Contact Infomation</strong></h5>

                <p class="text-white d-flex mb-2">
                    <i class="bi-telephone me-2"></i>

                    <a href="tel: 305-240-9671" class="site-footer-link">
                        081262945602
                    </a>
                </p>

                <p class="text-white d-flex">
                    <i class="bi-envelope me-2"></i>

                    <a href="#" class="site-footer-link">
                        1687210113
BNI a.n Pendidikan Anak Rumah Damai

                    </a>
                </p>

                <p class="text-white d-flex mt-3">
                    <i class="bi-geo-alt me-2"></i>
                    Desa Lumban Silintong, Kecamatan
                    Balige, Kabupaten Toba.
                </p>

{{--                 <a href="#" class="custom-btn btn mt-3">Get Direction</a>
 --}}            </div>
        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-lg-6 col-md-7 col-12">
                    <p class="copyright-text mb-0">Copyright © 2024 <a href="#">G-08 of PA 2</a> D3TI22.
                        <a href="https://del.ac.id" target="_blank">Institut Teknologi Del</a><br>
                        Dibuat dengan penuh <i class="bi bi-heart-fill text-danger"></i>
                    </p>
                </div>
            
                <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-end align-items-center">
                    <ul class="social-icon">
            
                        <li class="social-icon-item">
                            <a href="https://www.instagram.com/yparumahdamai/" target="_blank" class="social-icon-link bi-instagram"></a>
                        </li>
            
                        <li class="social-icon-item">
                            <a href="https://wa.me/6281262945602" class="social-icon-link bi-whatsapp" target="_blank"></a>
                        </li>                    
            
                    </ul>
                </div>
            
            </div>
            
        </div>
    </div>
</footer>

<!-- JAVASCRIPT FILES -->

<script src="{{ asset('kind/js/jquery.min.js')}}"></script>
<script src="{{ asset('kind/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('kind/js/jquery.sticky.js')}}"></script>
<script src="{{ asset('kind/js/click-scroll.js')}}"></script>
<script src="{{ asset('kind/js/counter.js')}}"></script>
<script src="{{ asset('kind/js/custom.js')}}"></script>


</body>

</html>