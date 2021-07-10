<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Davinci') }}</title>
    <link rel="stylesheet" href="{{asset('css/chat_style.css')}}">
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Davinci</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('img/logos/AdminLogo_Red.png') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">

    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/icomoon.css')}}">
    
    <!-- Slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slider.css')}}">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <!-- Color Switcher -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/switcher.css')}}">
    
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    
    
    <!-- Main Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" id="colors">
       <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    
    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    {{-- @yield('chat_style') --}}
</head>


<body>
    {{-- <div id="app" class=" pb-5"> --}}
    @yield('content')
    {{-- </div> --}}
</body>
@yield('javascript')
</html>
