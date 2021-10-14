<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- COMMON CSS -->
    <link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/ionicons.css') }}" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">
    <!-- PAGE WISE CSS -->
    @stack('css')

</head>
<body>

    @include('layouts.frontend.partials.header')

    @yield('content')

    @include('layouts.frontend.partials.footer')

    <script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
    <!-- TOASTR JS -->
    <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <!-- PAGE WISE JS -->
    @stack('js')
</body>
</html>
