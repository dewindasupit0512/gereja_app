<header class="header trans_200">
		
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="top_bar_content d-flex flex-row align-items-center justify-content-end">
                        <div class="top_bar_item"><a href="{{ route('kontak') }}">Alamat :</a></div>
                        <div class="top_bar_item"><a href="{{ route('kontak') }}">Jln.Ibantong dalam. Kel. Tumobui, Kotamobagu</a></div>
                        <!-- <div class="top_bar_item"><a href="#">Jln.Budi Kemasyarakatan No. 5 Pulo Brayan Kota, Medan</a></div> -->
                        <div class="emergencies  d-flex flex-row align-items-center justify-content-start ml-auto">Gembala Sidang : +62852-7794-8885</div>
                        {{-- <div class="top_bar_item"><a href="{{ route('login') }}">Login</a></div> --}}
                        {{-- @auth
                            <div class="top_bar_item"><a href="{{ route('admin.home') }}">Admin Panel</a></div>
                        @else
                            <div class="top_bar_item"><a href="{{ route('login') }}">Login</a></div>
                        @endauth --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-end">
                        <nav class="main_nav ml-auto">
                            <ul>
                                <li><a href="{{ route('home-page') }}">BERANDA</a></li>
                                <li><a href="{{ route('kontak') }}">KONTAK</a></li>
                                @auth
                                    <li><a href="{{ route('admin.home') }}">ADMIN PANEL</a></li>
                                    <li><a href="{{ route('logout') }}">KELUAR</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">LOGIN</a></li>
                                @endauth        
                            </ul>
                        </nav>
                        <div id="navbar-dropdown-btn" class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="navbar-dropdown-menu" class="dropdown-container hide">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home-page') }}">BERANDA</a></li>
                    <li><a href="{{ route('kontak') }}">KONTAK</a></li>
                    @auth
                        <li><a href="{{ route('admin.home') }}">ADMIN PANEL</a></li>
                        <li><a href="{{ route('logout') }}">KELUAR</a></li>
                    @else
                        <li><a href="{{ route('login') }}">LOGIN</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <!-- Logo -->
    <div class="logo_container_outer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="logo_container">
                        <a href="{{ route('home-page') }}">
                            <div class="logo_content d-flex flex-column align-items-start justify-content-center">
                                <div class="logo_line"></div>
                                <div class="logo d-flex flex-row align-items-center justify-content-center">
                                    <div class="logo_text">GPDI<span> TUMOBUI</span></div>
                                    <!-- <div class="logo_box">+</div> -->
                                </div>
                                <div class="logo_sub">Jl.Ibantong Dalam. Kotamobagu Timur</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
    </div>

</header>

@push('scripts')
<script>
    
    $('#navbar-dropdown-btn').click(function() {
        $('#navbar-dropdown-menu').toggleClass('hide')
    })

    $( window ).on('resize', function () {
        if ($(this).width() > 991) {
            $('#navbar-dropdown-menu').addClass('hide')            
        }
    })

</script>
@endpush