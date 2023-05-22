@push('stylesheet')
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/css/fontastic.css') }}">
    <!-- Google fonts - Roboto -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"> -->
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admin_dependencies/css/custom.css') }}">
    <!-- Favicon-->
    {{-- <link rel="shortcut icon" href="img/icon.png"> --}}

    <link rel="stylesheet" href="{{ asset('css/admin_app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush

@extends('layouts.base_layout')

@section('content')

{{-- <div class="app super_container"> --}}
    <div class="app admin-app">
        
        @stack('sidebar-slot')

        {{ $slot }}
        
    </div>
    
@endsection

@push('scripts')
    <script src="{{ asset('admin_dependencies/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_dependencies/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admin_dependencies/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_dependencies/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script src="{{ asset('admin_dependencies/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admin_dependencies/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dependencies/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin_dependencies/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('admin_dependencies/js/charts-home.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('admin_dependencies/js/front.js') }}"></script>
    
@endpush