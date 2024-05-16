@extends('layouts.management.header')

<style>
           /* Animasi putaran untuk indikator loading */
           @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
          }
        
          /* Gaya untuk wrapper loading */
          #loadingWrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Set tinggi agar memenuhi tinggi layar */
          }
        
        
          .pl {
          width: 6em;
          height: 6em;
        }
        
        .pl__ring {
          animation: ringA 2s linear infinite;
        }
        
        .pl__ring--a {
          stroke: #172450;
        }
        
        .pl__ring--b {
          animation-name: ringB;
          stroke: #3b598a;
        }
        
        .pl__ring--c {
          animation-name: ringC;
          stroke: #172450;
        }
        
        .pl__ring--d {
          animation-name: ringD;
          stroke: #3b598a;
        }
        @keyframes ringA {
          from, 4% {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -330;
          }
        
          12% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -335;
          }
        
          32% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -595;
          }
        
          40%, 54% {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -660;
          }
        
          62% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -665;
          }
        
          82% {
            stroke-dasharray: 60 600;
            stroke-width: 30;
            stroke-dashoffset: -925;
          }
        
          90%, to {
            stroke-dasharray: 0 660;
            stroke-width: 20;
            stroke-dashoffset: -990;
          }
        }
        
        @keyframes ringB {
          from, 12% {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -110;
          }
        
          20% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -115;
          }
        
          40% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -195;
          }
        
          48%, 62% {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -220;
          }
        
          70% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -225;
          }
        
          90% {
            stroke-dasharray: 20 200;
            stroke-width: 30;
            stroke-dashoffset: -305;
          }
        
          98%, to {
            stroke-dasharray: 0 220;
            stroke-width: 20;
            stroke-dashoffset: -330;
          }
        }
        
        @keyframes ringC {
          from {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: 0;
          }
        
          8% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -5;
          }
        
          28% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -175;
          }
        
          36%, 58% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -220;
          }
        
          66% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -225;
          }
        
          86% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -395;
          }
        
          94%, to {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -440;
          }
        }
        
        @keyframes ringD {
          from, 8% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: 0;
          }
        
          16% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -5;
          }
        
          36% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -175;
          }
        
          44%, 50% {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -220;
          }
        
          58% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -225;
          }
        
          78% {
            stroke-dasharray: 40 400;
            stroke-width: 30;
            stroke-dashoffset: -395;
          }
        
          86%, to {
            stroke-dasharray: 0 440;
            stroke-width: 20;
            stroke-dashoffset: -440;
          }
        }
          /* Gaya untuk indikator loading */
          .loading-spinner {
            display: inline-block;
            width: 6em;
            height: 6em;
            animation: spin 1s linear infinite;
          }
</style>



</head>
<body>
    <body>
      <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div id="loadingWrapper">
                  <div id="loadingIndicator" class="loading-spinner">
                    <!-- SVG Loader -->
                    <svg viewBox="0 0 240 240" height="240" width="240" class="pl">
                      <circle stroke-linecap="round" stroke-dashoffset="-330" stroke-dasharray="0 660" stroke-width="20" stroke="#000" fill="none" r="105" cy="120" cx="120" class="pl__ring pl__ring--a"></circle>
                      <circle stroke-linecap="round" stroke-dashoffset="-110" stroke-dasharray="0 220" stroke-width="20" stroke="#000" fill="none" r="35" cy="120" cx="120" class="pl__ring pl__ring--b"></circle>
                      <circle stroke-linecap="round" stroke-dasharray="0 440" stroke-width="20" stroke="#000" fill="none" r="70" cy="120" cx="85" class="pl__ring pl__ring--c"></circle>
                      <circle stroke-linecap="round" stroke-dasharray="0 440" stroke-width="20" stroke="#000" fill="none" r="70" cy="120" cx="155" class="pl__ring pl__ring--d"></circle>
                    </svg>
                  </div>
                </div>
                <div class="auth-form-light text-center py-5 px-4 px-sm-5" style="display: none;">
                  <div class="brand-logo" style="display: none;">
                    <img src="{{ asset('skydash/images/logo.png') }}" alt="logo">
                  </div>
                  <h4 style="display: none;">Yayasan Pendidikan Anak Rumah Damai</h4>
                  <h6 class="font-weight-light" style="display: none;">Sistem Informasi Administrasi</h6>                  
                  @if ($errors->any())
                  <div style="color: red;">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  <form id="loginForm" method="POST" class="pt-3" action="{{ url('/login') }}" style="display: none;">
            @csrf
            <div class="form-group">
              <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" value="{{ old('email') }}" required placeholder="Email">
          </div>
          <div class="form-group">
              <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" required placeholder="Password">
          </div>
          
                    <div class="mt-3">
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                      <div class="form-check">
                        <a href="#" class="auth-link text-black" id="forgotPassword">Forgot password?</a>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm font-weight-medium auth-form-btn" id="loginButton">Sign In</button>
                  </div>
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

      <script>
        // Menampilkan indikator loading
        document.getElementById('loadingIndicator').style.display = 'block';

        // Mendeteksi ketika semua elemen halaman telah dimuat
        window.addEventListener('load', function() {
          // Menyembunyikan indikator loading
          document.getElementById('loadingIndicator').style.display = 'none';
          // Menampilkan elemen halaman
          document.querySelector('.auth-form-light').style.display = 'block';
          document.querySelector('.brand-logo').style.display = 'block';
          document.querySelector('h4').style.display = 'block';
          document.querySelector('.font-weight-light').style.display = 'block';
          document.querySelector('form#loginForm').style.display = 'block';
          // Menyembunyikan wrapper loading
          document.getElementById('loadingWrapper').style.display = 'none';
        });

        document.getElementById('forgotPassword').addEventListener('click', function (event) {
            event.preventDefault();
            alert('Silahkan hubungi admin :)');
        });

        document.getElementById('loginForm').addEventListener('submit', function () {
            document.getElementById('loadingIndicator').style.display = 'block';
        });
    </script>
</body>
</html>
