<x-home-master>
    @section('content')
        <!-- Preloader Start-->
        {{-- <div id="preloader">
            <div class="row loader">
            <div class="loader-icon"></div>
            </div>
        </div> --}}
        <!-- Preloader End -->

        <!-- Page Title START -->

        {{-- <div class="container "> --}}
            {{-- <div class="row ">
                <div class="col-md-6 m-auto">
                    <img src="{{url(asset('/img/new/banners/About.png'))}}" alt="">
                </div>
                <div class="col-md-4 text-center m-auto">
                    <h1>About Us</h1>
                </div>
            </div> --}}
            <section class="page-title-section-about" data-type="background" data-speed="5" >

                <div class="col-md-4 text-center m-auto mt-2">
                    <h1>About Us</h1>
                </div>
            </section>

            {{-- <section class="feature-image feature-image-default" data-type="background" data-speed="2">
                 <img src="{{url(asset('/images/hero-bg.jpg'))}}" >
            </section> --}}



        {{-- </div> --}}
        <!-- Page Title END -->


        <!-- Info Section START -->
        <div class="section-block">
            <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                <div class="pr-30-md">
                    <div class="section-heading">
                    <h4>Who Are We ?</h4>
                    </div>
                    <div class="section-heading-line-left"></div>
                    <div class="text-content-big mt-20">
                    <p>We are a software house located in Egypt. We’ve been in business since 2017.
                    We provide on-demand website management services and build websites and mobile applications.</p>
                    </div>
                    <div class="mt-20">
                    <ul class="primary-list">
                        <li><i class="fa fa-check-square"></i>A touch of creativity.</li>
                        <li><i class="fa fa-check-square"></i>The excellent tech work.</li>
                        <li><i class="fa fa-check-square"></i>Affordable Websites for You.</li>
                        <li><i class="fa fa-check-square"></i>Awesome marketing solutions.</li>
                        <li><i class="fa fa-check-square"></i>High security.</li>
                        <li><i class="fa fa-check-square"></i>Communications at its best.</li>
                        <li><i class="fa fa-check-square"></i>Design solutions for any media.</li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                <img src="{{asset('/images/orders.png')}}" class="rounded-border shadow-primary mt-15-xs" alt="img">
                </div>
            </div>
            </div>
        </div>
        <!-- Info Section END -->


        <!-- Features Section START -->
        <div class="section-block-bg" style="background-image: url(/img/woman-31.jpg);">
            <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-12 offset-md-5">
                <div class="section-heading">
                    <span>Improve your business with us !</span>
                    <h4>First class business solutions</h4>
                    <div class="section-heading-line-left"></div>
                    <div class="text-content-big mt-10">
                    <p>A lot of our customers come to us because they want a more professional, dependable team of websites developers.
                        Another reason is that their current website developers don't have the experience to build a good website,
                        and they want us to either fix it or rebuild it properly.</p>
                    </div>
                </div>
                <!-- Feature Boxes START -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                        <div class="feature-flex-square-icon">
                            <i class="icon-target"></i>
                        </div>
                        <div class="feature-flex-square-content">
                            <h4><a href="#">Creative Web Design Services</a></h4>
                            <p>Our web design services will greatly enhance your business’s presence on the Internet.</p>
                            <a href="#" class="feature-flex-square-content-button">Learn More</a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                        <div class="feature-flex-square-icon">
                            <i class="icon-diamond"></i>
                        </div>
                        <div class="feature-flex-square-content">
                            <h4><a href="#">Competitive Prices</a></h4>
                            <p>We can create your professional site in the fastest time, highest quality and reasonable price.</p>
                            <a href="#" class="feature-flex-square-content-button">Learn More</a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                        <div class="feature-flex-square-icon">
                            <i class="icon-networking"></i>
                        </div>
                        <div class="feature-flex-square-content">
                            <h4><a href="#">We’re a Team</a></h4>
                            <p>Da-Vinci's highly-skilled team of programmers and developers are ahead of the curve in all the current technological advances.</p>
                            <a href="#" class="feature-flex-square-content-button">Learn More</a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                        <div class="feature-flex-square-icon">
                            <i class="icon-hourglass"></i>
                        </div>
                        <div class="feature-flex-square-content">
                            <h4><a href="#">Website Development</a></h4>
                            <p>Step inside the center of excellence where we build bold, engaging new websites.</p>
                            <a href="#" class="feature-flex-square-content-button">Learn More</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Feature Boxes END -->
                </div>
            </div>
            </div>
        </div>
        <!-- Features Section END -->


        <!-- Map Info Section START -->
        <div class="section-block">
            <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                <img src="{{asset('/images/lp-1.png')}}" class="mb-15-xs" alt="map">
                </div>
                <div class="col-md-5 col-sm-6 col-12 offset-md-1">
                <div class="section-heading">
                    <h5>Excellent Accessibility </h5>
                    <div class="section-heading-line-left"></div>
                </div>
                <ul class="primary-list">
                <div class="text-content mt-25">
                    <li style="font-size: 15px"><i class="fa fa-caret-right"></i>Da-Vinci's highly-skilled team of programmers and developers are ahead of the curve in all the current technological advances.
                    Every detail is evaluated to ensure that the site performs for ultimate user pleasure and engagement. We insist upon a flawless user experience.</li>
                </div>
                <div class="text-content mt-25">
                    <li style="font-size: 15px"><i class="fa fa-caret-right"></i>We are passionate about helping companies achieve their goals.  So when you choose Da-Vinci,
                    you will not get just a website, but an integrated website that fits your company, goals and needs.</li>
                </div>
                </ul>
                <div class="mt-25">
                    <a href="{{route('contacts')}}" class="primary-button button-sm">Contact Us</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Map Info Section END -->


        <!-- Clients Carousel START -->
        {{-- <div class="section-clients border-top border-bottom">
            <div class="container">
            <div class="owl-carousel owl-theme clients" id="clients">
                <div class="item">
                <img src="http://via.placeholder.com/155x75" alt="partner-image">
                </div>

                <div class="item">
                <img src="http://via.placeholder.com/155x75" alt="partner-image">
                </div>

                <div class="item">
                <img src="http://via.placeholder.com/155x75" alt="partner-image">
                </div>

                <div class="item">
                <img src="http://via.placeholder.com/155x75" alt="partner-image">
                </div>

                <div class="item">
                <img src="http://via.placeholder.com/155x75" alt="partner-image">
                </div>

                <div class="item">
                <img src="http://via.placeholder.com/155x75" alt="partner-image">
                </div>
            </div>
            </div>
        </div> --}}
        <!-- Clients Carousel END -->


        @section('scripts')



        @endsection


    @endsection
</x-home-master>
