<header class="header trans_200">
		
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="top_bar_content d-flex flex-row align-items-center justify-content-end">
                        <div class="top_bar_item"><a href="contanct.php">Alamat :</a></div>
                        <div class="top_bar_item"><a href="contanct.php">Jln.Ibantong dalam. Kel. Tumobui, Kotamobagu</a></div>
                        <!-- <div class="top_bar_item"><a href="#">Jln.Budi Kemasyarakatan No. 5 Pulo Brayan Kota, Medan</a></div> -->
                        <div class="emergencies  d-flex flex-row align-items-center justify-content-start ml-auto">Gembala Sidang : +62852-7794-8885</div>
                        {{-- <div class="top_bar_item"><a href="{{ route('login') }}">Login</a></div> --}}
                        @auth
                            <div class="top_bar_item"><a href="{{ route('admin.home') }}">Admin Panel</a></div>
                        @else
                            <div class="top_bar_item"><a href="{{ route('login') }}">Login</a></div>
                        @endauth
                        
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
                            </ul>
                        </nav>
                        <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logo -->
    <div class="logo_container_outer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="logo_container">
                        <a href="index.php">
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
