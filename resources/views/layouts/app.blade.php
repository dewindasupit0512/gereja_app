@push('stylesheet')
    {{-- Bootstrap Dependencies --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/solid.css') }}">

    {{-- Plugins --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
@endpush

@extends('layouts.base_layout')

@section('content')

    @include('layouts.inc.navbar')

    <div class="app super_container">
        {{ $slot }}
    </div>

    @include('layouts.inc.footer')

@endsection

@push('scripts')

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('plugins/progressbar/progressbar.min.js') }}"></script>
    <script src="{{ asset('js/elements.js') }}"></script>
    <script src="{{ asset('js/services.js') }}"></script>
    
@endpush