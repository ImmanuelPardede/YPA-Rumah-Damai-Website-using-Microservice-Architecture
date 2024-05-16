<div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="{{ route('dashboard') }}"><img
                    src="{{ asset('skydash/images/logo.png') }}" class="mr-2" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
                    src="{{ asset('skydash/images/logo.png') }}" alt="logo" /></a>
        </div>


        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                            aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">

                <ul class="navbar-nav navbar-nav-right">



                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            @if (Auth::user()->unreadNotifications->count() > 0)
                                <span class="count">{{ Auth::user()->unreadNotifications->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            @php $firstNotification = true; @endphp
                            @foreach (Auth::user()->notifications as $notification)
                                @if ($firstNotification)
                                    <a class="dropdown-item preview-item" href="#pengumuman">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="ti-info-alt mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-normal">Pengumuman terbaru</h6>
                                            <p class="font-weight-light small-text mb-0 text-muted">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </a>
                                    @php $firstNotification = false; @endphp
                                @endif
                            @endforeach
                        </div>
                    </li>










                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <!-- Ganti teks statis dengan nama lengkap pengguna yang terautentikasi -->
                            <!-- Jika pengguna terautentikasi dan memiliki foto profil -->
                            @if (Auth::check() && Auth::user()->foto)
                                <img src="{{ asset('uploads/pegawai/' . Auth::user()->foto) }}" alt="">
                            @else
                                <!-- Jika pengguna belum terautentikasi atau tidak memiliki foto profil -->
                                <img src="{{ asset('uploads/default/bodat.jpg') }}" alt="Default Photo">
                            @endif
                            <span> {{ Auth::user()->nama_lengkap }}
                            </span> <!-- Teks "halo" yang Anda tambahkan -->
                            <!-- Tambahkan ikon panah ke bawah -->
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">

                            @if (auth()->user()->role == 'guru')
                                <a class="dropdown-item"
                                    href="{{ route('guru.DataDiri.password', ['user' => auth()->user()->id]) }}">
                                    <i class="ti-settings text-primary"></i>

                                    Settings </a>
                            @elseif(auth()->user()->role == 'staff')
                                <a class="dropdown-item"
                                    href="{{ route('staff.DataDiri.password', ['user' => auth()->user()->id]) }}">
                                    <i class="ti-settings text-primary"></i>

                                    Settings
                                </a>
                            @elseif(auth()->user()->role == 'direktur')
                                <a class="dropdown-item"
                                    href="{{ route('direktur.DataDiri.password', ['user' => auth()->user()->id]) }}">
                                    <i class="ti-settings text-primary"></i>

                                    Settings
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }} "
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->

        <!-- partial -->



        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        <script>
            document.getElementById('notificationDropdown').addEventListener('click', function() {
                var countElement = this.querySelector('.count');
                if (countElement) {
                    countElement.style.display = 'none';
                    // Send an AJAX request to mark notifications as read
                    fetch('/mark-as-read', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    }).then(response => {
                        if (response.ok) {
                            console.log('Notifications marked as read.');
                        } else {
                            console.error('Failed to mark notifications as read.');
                        }
                    }).catch(error => {
                        console.error('An error occurred:', error);
                    });
                }
            });
        </script>
