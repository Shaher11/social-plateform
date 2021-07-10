<!DOCTYPE html>
<html lang="zxx">
<head>
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
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">--}}

    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    @yield('extra-style')


  </head>
<body>


    <!-- Preloader Start-->
    <div id="preloader">
        <div class="row loader" >
            <div class="loader-icon"></div>

        </div>
    </div>
    <!-- Preloader End -->


    <!-- Top-Bar START -->
    <div id="top-bar" class="hidden-sm-down">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="top-bar-welcome">
                        <ul>
                            <li>Welcome to Social platform</li>
                        </ul>
                    </div>
                    <div class="top-bar-info">
                        <ul>
                            <li><i class="fa fa-phone"></i>(+02) 123456789<li>
                            <li><i class="fa fa-envelope"></i>test@test.com <li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <ul class="social-icons hidden-md-down">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title="comming Soon"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" title="comming Soon"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Top-Bar END -->


    <!-- Navbar START -->
    <header>
        <nav id="navigation4" class="container navigation">
            <div class="nav-header">
                <a class="nav-brand" href="{{route('home')}}">
                    <img src="{{url('img/logos/logo-1.png')}}" class="main_logo" alt="logo" id="main_logo">
                </a>
                <div class="nav-toggle"></div>
            </div>


            <div class="nav-menus-wrapper">

                <ul class="nav-menu align-to-right">

                    <li><a href="{{route('home')}}">Home</a></li>
                 
                    <li><a href="{{route('posts')}}">Blog</a></li>


                        <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{Auth::user()->photo ? Auth::user()->photo->file: asset('/images/user.png')  }} " style="margin-right: 1rem"  alt="{{Auth::user()->user_name}}" class="rounded-circle" width="35rem" height="35rem">
                            {{ Auth::user()->full_name }}
                        </a>

                        @if(Auth::user()->role_id == 1 && Auth::user()->status == 1)
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/">Profile</a>
                                <a class="dropdown-item" href="{{route('admin.users.edit', Auth::user())}}">Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @elseif(Auth::user()->role_id == 2 && Auth::user()->status == 1 )
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('users.dashboard')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('users.edit', ['user' => Auth::id()])}}">Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @elseif(Auth::user()->role_id == 3 && Auth::user()->status == 1 )
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('users.dashboard')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('users.edit', ['user' => Auth::id()])}}">Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: #d21e2b; ">Suspended Account</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        @endif




                    </li>
                    @endguest


                </ul>
            </div>
        </nav>
    </header>
    <!-- Navbar END -->

                    @yield('content')




                    <!-- Footer START -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Column 1 Start -->
                <div class="col-md-4 col-sm-6 col-12">
                    <h3>About Us</h3>
                    <div class="mt-25">
                        <img src="{{asset('img/logos/logo-footer.png')}}" alt="footer-logo" style="width: 60%">
                        <p class="mt-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
                            <div class="footer-social-icons mt-25">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="comming Soon"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" title="comming Soon"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                    </div>
                </div>
                    <!-- Column 1 End -->

                <!-- Column 2 Start -->
                <div class="col-md-4 col-sm-6 col-12">
                    <h3>Quick Links</h3>
                    <ul class="footer-list">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('posts')}}">Blog</a></li>
                  
                    </ul>
                </div>
                <!-- Column 2 End -->

                    <!-- Column 3 Start -->
                <div class="col-md-4 col-sm-6 col-12">
                    <h3>Recent Posts</h3>
                    <div class="mt-25">
                        <!-- Post Start -->
                        @foreach (App\Post::where('status',1)->with('photo')->orderBy('created_at', 'desc')->take(3)->get() as $post)
                        <div class="footer-recent-post clearfix">
                            <div class="footer-recent-post-thumb">
                                <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/80x80' }}" alt="{{$post->title}}">
                            </div>
                            <div class="footer-recent-post-content">
                                <span>{{$post->created_at->diffForHumans()}}</span>
                                <a href="#">{{$post->title}}</a>
                            </div>
                        </div>
                        @endforeach
                        <!-- Post End -->
                    </div>
                </div>
                <!-- Column 3 End -->

           
            
            </div>

            <!-- Footer Bar Start -->
            <div class="footer-bar">
                <div class="row">
                    <div class="col-6">
                        <p><span class="primary-color">Social Platform</span> © 2020. All Rights Reserved.</p>
                    </div>
                    <div class="col-6 ">
                        <div class="pull-right">
                            <p> Powered by @ <a target="_blank" href="#"> <span class="primary-color">Mohamed Ramadan</span> </a> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bar End -->
        </div>
    </footer>
<!-- Footer END -->


<!-- Scroll to top button Start -->
<a href="#" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<!-- Scroll to top button End -->

<!-- Jquery -->

<script src="{{asset('js/jquery.min.js')}}"></script>

<!--Popper JS-->
<script src="{{asset('js/popper.min.js')}}"></script>

<!-- parallax  -->
<script src="{{asset('js/parallax.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<!-- Bootstrap JS-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Owl Carousel-->
<script src="{{asset('js/owl.carousel.js')}}"></script>

<!-- Navbar JS -->
<script src="{{asset('js/navigation.js')}}"></script>
<script src="{{asset('js/navigation.fixed.js')}}"></script>

<!-- Wow JS -->
<script src="{{asset('js/wow.min.js')}}"></script>

<!-- Countup -->
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>

<!-- Tabs -->
<script src="{{asset('js/tabs.min.js')}}"></script>

<!-- Yotube Video Player -->
<script src="{{asset('js/jquery.mb.YTPlayer.min.js')}}"></script>

<!-- Swiper Slider -->
<script src="{{asset('js/swiper.min.js')}}"></script>

<!-- Isotop -->
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>

<!-- Modernizr -->
<script src="{{asset('js/modernizr.js')}}"></script>

<!-- Switcher JS -->
<script src="{{asset('js/switcher.js')}}"></script>

<!-- Google Map -->
<script src="{{asset('js/map.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>


@yield('javascript')

</body>

</html>
