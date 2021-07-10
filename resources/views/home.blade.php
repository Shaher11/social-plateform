<x-home-master>

@section('content')

    <!-- Video Section START -->
        <div class="main-video-section">
            <div class="video-area" id="video-area">

                <div class="player" id="main-video-play"
                    data-property="{videoURL:'https://www.youtube.com/watch?v=FAplyNf7uuE', containment:'#video-area', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:7, opacity:1, quality:'low',}">
                </div>


                <div class="main-video-overlay">
                    <div class="main-video-content">
                        <div class="container">
                            <div class="white-color">
                                <h3><strong>Make a fully customizable website</strong></h3>
                                <div class="mt-15">
                                    <h6>The first rule of any technology used in a business is that automation applied to an efficient operation will magnify the efficiency. The
                                        second is that automation applied to an inefficient operation will magnify the inefficiency.</h6>
                                </div>
                                <a href="/website" class="primary-button button-md mt-30">Become a Client</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Section END -->

        <!-- Progress Bars Section START -->
        <div class="section-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="section-heading">
                            <span>Gain a Success !</span>
                            <h4>Empower your Business with Us !</h4>
                        </div>
                        <div class="text-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-6 col-12 offset-md-1">
                        <!-- PROGRESS BARS Start -->
                        <div class="mt-35">
                            <!-- Progress Bar Start -->
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        Sales Services
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 text-right">
                                        25%
                                    </div>
                                </div>
                            </div>
                            <div class="progress custom-progress">
                                <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                     style="width:25%">
                                </div>
                            </div>
                            <!-- Progress Bar End -->

                            <!-- Progress Bar Start -->
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        Online Reputation
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 text-right">
                                        50%
                                    </div>
                                </div>
                            </div>
                            <div class="progress custom-progress">
                                <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                     style="width:50%">
                                </div>
                            </div>
                            <!-- Progress Bar End -->

                            <!-- Progress Bar Start -->
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6">
                                        Strategic Consulting
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 text-right">
                                        75%
                                    </div>
                                </div>
                            </div>
                            <div class="progress custom-progress">
                                <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                     style="width:75%">
                                </div>
                            </div>
                            <!-- Progress Bar End -->
                        </div>
                        <!-- PROGRESS BARS End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Progress Bars Section END -->

        <!-- Blog Grid START -->
        <div class="section-block-grey">
            <div class="container">
                <div class="section-heading center-holder">
                    <span>Tips & News</span>
                    <h3>Read Our Latest Articles</h3>
                    <div class="section-heading-line"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="row mt-50">
                    @foreach($recent_post as $post)
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="blog-grid">
                                <div class="blog-grid-img">
                                    <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/250x220' }}" alt="img" width="250" height="220">
                                    <div class="data-box-grid">
                                        <h4>{{$post->created_at->format('d')}}</h4>
                                        <p>{{$post->created_at->format('M')}}</p>
                                    </div>
                                </div>
                                <div class="blog-grid-text">
                                    <span>Business</span>
                                    <h4>{{Str::limit($post->title, 20)}}</h4>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i>{{$post->created_at->diffForHumans()}}</li>
                                        <li><i class="fa fa-list-ul"></i>Business</li>
                                    </ul>
                                    <p>{{Str::limit($post->body, 90)}}</p>

                                    <div class="mt-20 left-holder">
                                        <a href="{{route('showPost', $post->id)}}" class="primary-button button-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Blog Grid END -->


        <!-- Notice Section START -->
        <div class="notice-section notice-section-sm border-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-12">
                        <div class="mt-5">
                            <h6>Looking for Professional Approach and Quality Services ?</h6>
                            <div class="section-heading-line-left"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12">
                        <div class="mt-10 right-holder-md">
                            <a href="{{route('contacts')}}" class="primary-button button-sm mt-15-xs">Contact Us Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Notice Section END -->



    @endsection
</x-home-master>
