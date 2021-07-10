<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Davinci</title>
    <meta charset="UTF-8">
    {{-- <link rel="shortcut icon" href="img/logos/logo-shortcut.png"/> --}}
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


    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    {{-- @yield('chat_style') --}}
</head>
<body>


    <!-- Preloader Start-->
    <div id="preloader">
        <div class="row loader" >
            <div class="loader-icon"></div>

        </div>
    </div>
    <!-- Preloader End -->

    <!-- Navbar START -->
    <header >
        <nav id="navigation4" class="container navigation">
            <div class="nav-header">
                <a class="nav-brand" href="{{route('home')}}">
                    <img src="{{url('img/logos/Untitled-2.png')}}" class="main-logo" alt="logo" id="main_logo">
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu align-to-right">
                 
                    {{-- <li><a href="{{route('home')}}">Home</a></li> --}}

                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{Auth::user()->photo ? Auth::user()->photo->file: asset('/images/user.png')  }} "  alt="{{Auth::user()->user_name}}" class="rounded-circle" style="margin-right: 1rem" width="35rem" height="35rem">
                            {{ Auth::user()->full_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-capitalize" href="{{route('home')}}">Home</a>
                            <a class="dropdown-item text-capitalize" href="{{route('users.dashboard')}}">Profile</a>
                            <a class="dropdown-item text-capitalize" href="{{route('users.edit', ['user' => Auth::id()])}}">Settings</a>
                            <a class="dropdown-item text-capitalize" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-capitalize" href="{{route('home')}}">Home</a>
                                @if(Auth::user()->role_id == 1)
                                <a class="dropdown-item text-capitalize" href="/">Profile</a>
                                @else
                                    <a class="dropdown-item text-capitalize" href="{{route('users.dashboard')}}">Profile</a>
                                @endif
                                {{-- <a class="dropdown-item text-capitalize" href="{{route('users.dashboard')}}">Profile</a> --}}
                                <a class="dropdown-item text-capitalize" href="{{route('users.edit', ['user' => Auth::id()])}}">Settings</a>
                                <a class="dropdown-item text-capitalize" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
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
                        <img src="{{asset('img/new/logos/DaVinci_Footer.png')}}" alt="footer-logo" style="width: 55%">
                        <p class="mt-25">Now you can turn your ideas into reality,
                            We can create your professional site in the fastest time, highest quality and reasonable price.</p>
                            <div class="footer-social-icons mt-25">
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="comming Soon"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" title="comming Soon"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                    </div>
                </div>
                    <!-- Column 1 End -->

                <!-- Column 2 Start -->
                <div class="col-md-3 col-sm-6 col-12">
                    <h3>Quick Links</h3>
                    <ul class="footer-list">
                        <li><a href="{{route('home')}}">Home</a></li>
                 
                        <li><a href="{{route('posts')}}">Blog</a></li>
                    </ul>
                </div>
                <!-- Column 2 End -->

                    <!-- Column 3 Start -->
                <div class="col-md-3 col-sm-6 col-12">
                    <h3>Recent Posts</h3>
                    <div class="mt-25">
                        <!-- Post Start -->
                        @foreach (App\Post::where('status',1)->with('photo')->orderBy('created_at', 'desc')->take(3)->get() as $post)
                        <div class="footer-recent-post clearfix">
                            <div class="footer-recent-post-thumb">
                                <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/80x80' }}" width="80" height="80"  alt="{{$post->title}}">
                            </div>
                            <div class="footer-recent-post-content">
                                <span>{{$post->created_at->diffForHumans()}}</span>
                                <a href="{{route('showPost', $post->id)}}">{{$post->title}}</a>
                            </div>                        
                        </div>
                        @endforeach
                        <!-- Post End -->
                    </div>
                </div>
                <!-- Column 3 End -->

                <!-- Column 4 Start -->
                <div class="col-md-2 col-sm-6 col-12">
                    <h3>Tags</h3>
                    <div class="footer-tags mt-25">
                        @foreach (App\Tag::all() as $tag)
                            <a href="#">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Column 4 End -->
            </div>


            <!-- Footer Bar Start -->
            <div class="footer-bar">
                <div class="row"> 
                    <div class="col-6">
                        <p><span class="primary-color">Social Platform</span> © 2020. All Rights Reserved.</p>
                    </div>
                    <div class="col-6 ">
                        <div class="pull-right">    
                            <p> Powered by @ <a href=""> <span class="primary-color">Mohamed Ramadan</span> </a> </p>  
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
