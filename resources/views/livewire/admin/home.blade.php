@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-home.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-home">
    @include('layouts.inc.admin-navbar')

    <div class="page-content" style="background-image: url({{ asset('img/bg1.jpg') }})">
        <div class="image-container">
            <img src="{{ asset('img/gpdi-logo.png') }}" alt="GPDI Logo">
        </div>

        <div class="card-box">
            <h1 class="hero-title">Admin Panel</h1>
            <h2 class="hero-subtitle">GPDI APOSTOLOS</h2>
        </div>
        

        {{-- <div class="row-wrapper">
            <div class="hero">
                <h1>Admin Panel</h1>
                <h3>GPDI Apostolos</h3>
            </div>
        </div> --}}
    </div>

</div>