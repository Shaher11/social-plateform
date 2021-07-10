<x-home-master>

    @section('content')

        <!-- Page Title START -->
        <section class="page-title-section-about" data-type="background" data-speed="5" >

            <div class="col-md-4 text-center m-auto ">
                <h1>{{$post->title}}</h1>
            </div>
        </section>
        <!-- Page Title END -->


        <!-- Blog Post START -->
        <div class="section-block">
            <div class="container">
                @if(Session::has('comment_message'))
                    <blockquote class="blockquote">

                        <p> {{session('comment_message')}}</p>

                    </blockquote>
                @endif

                @if(Session::has('reply_message'))
                <blockquote class="blockquote">

                    <p> {{session('reply_message')}}</p>

                </blockquote>
                @endif



                <div class="row">

                    <!-- Left Side START -->
                    <div class="col-md-9 col-sm-8 col-12">
                        <div class="blog-list-left">
                            <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/825x530' }}" alt="{{$post->title}}">

                            <div class="data-box">
                                <h4>{{$post->created_at->format('d')}}</h4>
                                <strong>{{$post->created_at->format('M')}}</strong>
                            </div>
                            <div class="blog-title-box">
                                <h2>{{$post->title}}</h2>
                                <span><i class="fa fa-calendar"></i>{{$post->created_at->diffForhumans()}}</span>
                                <!-- Tag Section-->
                            <span><i class="fa fa-list-ul"></i>	{{$post->category->name}}</span>
                            </div>

                            <div class="blog-post-content">

                                <p>{!! $post->body !!}</p>

                                @if($post->quote)
                                    <blockquote class="blockquote">
                                        <p><i class="fa fa-quote-left fa-2x"></i>{{$post->quote}}</p>
                                        <h4>- {{$post->quote_author}}</h4>
                                    </blockquote>
                                @endif

                                @if(count($comments) > 0)

                                    <!-- There is a one comment at least  -->

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li style="font-size: 15px">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="blog-comments mt-50">
                                        <h3 class="mt-0">All Comments:</h3>

                                        @foreach($comments as $comment)

                                            <div class="blog-comment-user">

                                                <div class="row mt-20">
                                                    <div class="col-md-1 hidden-sm-down pr-0">
                                                        <img src=" {{$comment->photo ? $comment->photo->file : asset('/images/user.png') }} " alt="{{$comment->author}}" class="rounded-circle" width="50rem" height="50rem">
                                                        {{-- <img src="{{Auth::user()->photo ? Auth::user()->photo->file: asset('/images/user.png')  }} "  alt="{{Auth::user()->user_name}}" class="rounded-circle" width="25rem" height="25rem"> --}}

                                                    </div>
                                                    <div class="col-md-11 col-12">
                                                        <div class="comment-block">
                                                            <h6>{{$comment->author}}</h6><strong>{{$comment->created_at->diffForHumans()}}</strong>
                                                            <p>
                                                                {{$comment->body}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--###### Comment Replies ######-->
                                                @if(count($comment->replies) > 0)

                                                    @foreach($comment->replies as $reply)

                                                        @if($reply->status == 1)
                                                            <div class="row mt-20 ml-5">
                                                                <div class="col-md-1 hidden-sm-down pr-0">
                                                                    <img src="{{$reply->photo ? $reply->photo->file : 'http://via.placeholder.com/50x50'}}" alt="user">
                                                                </div>
                                                                <div class="col-md-11 col-12">
                                                                    <div class="comment-block">
                                                                        <h6>{{$reply->author}}</h6><strong>{{$reply->created_at->diffForHumans()}}</strong>
                                                                        <p>
                                                                            {{$reply->body}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @endforeach

                                                @endif

                                                <!--###### Writte Replies ######-->
                                                <div class="row ">
                                                    <div class="col-md-1 hidden-sm-down pr-0">
                                                        {{-- <img src="http://via.placeholder.com/50x50" alt="user"> --}}
                                                    </div>
                                                    <div class="col-md-11 col-12">

                                                        @if(Auth::check())

                                                            {!! Form::open(['method'=>'POST', 'class'=>'comment-form', 'action'=>'CommentRepliesController@createReply','autocomplete'=>'off','files'=>true]) !!}

                                                            {{ csrf_field() }}

                                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <textarea name="body" placeholder="Your Reply"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-10 left-holder">
                                                                    <button  type="submit" class="primary-button button-md">Send Reply</button>
                                                                </div>

                                                            {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                @else

                                    <!-- There is no comments -->
                                    <div class="blog-comments mt-50">
                                        <h3 class="mt-0">All Comments:</h3>
                                        <div class="blog-comment-user">
                                            <div class="row mt-20">
                                                <div class="col-md-1 hidden-sm-down pr-0">
                                                    <img src="http://via.placeholder.com/50x50" alt="user">
                                                </div>
                                                <div class="col-md-11 col-12">
                                                    <div class="comment-block">
                                                        <p>No Comments yet !..</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                @endif

                                @if(Auth::check())

                                    <div class="blog-comments mt-0">

                                        <h3 class="mt-30">Your Comment:</h3>

                                        {!! Form::open(['method'=>'POST', 'class'=>'comment-form', 'action'=>'PostCommentsController@store','autocomplete'=>'off','files'=>true]) !!}

                                        {{ csrf_field() }}

                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <div class="row ml-5">
                                                <div class="col-12">
                                                    <textarea name="body" placeholder="Your Message"  required></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-10 ml-5 left-holder">
                                                <button  type="submit" class="primary-button button-md">Send Comment</button>
                                            </div>

                                        {!! Form::close() !!}

                                    </div>


                                @else

                                    <div class="blog-comments mt-0">

                                        <h3 class="mt-30">Your Comment:</h3>

                                        {!! Form::open(['method'=>'POST', 'class'=>'comment-form', 'action'=>'PostCommentsController@createUnloggedUserComment','autocomplete'=>'off','files'=>true]) !!}

                                            {{ csrf_field() }}

                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <div class="row ">
                                                <div class="col-6">
                                                    <input name="author" placeholder="Your Name" required>
                                                </div>
                                                <div class="col-6">
                                                    <input name="email" placeholder="E-mail address" required type="email" >
                                                </div>
                                                <div class="col-12">
                                                    <textarea name="body" placeholder="Your Message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-10 left-holder">
                                                <button  type="submit" class="primary-button button-md">Send Comment</button>
                                            </div>

                                        {!! Form::close() !!}

                                    </div>


                                @endif





                            </div>
                            <!-- blog-post-content END -->
                        </div>
                        <!-- Left Side END -->
                    </div>
                    <!-- col-md-9 END -->


                    <!-- Right Side START -->
                    <div class="col-md-3 col-sm-4 col-12">
                        <div class="blog-list-right">
                            {{-- <div id="search-input">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search"/>
                                    <span class="input-group-btn">
                                        <button class="btn" type="button">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> --}}

                            <!-- Categories -->
                            <div class="blog-list-left-heading">
                                <h4>Categories</h4>
                            </div>
                            <div class="blog-categories">
                                <ul>
                                    <li><a href="{{route('posts')}}">All Topics</a></li>
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('categories.show', $category)}}" @if($category->id == $post->category->id) class="text-danger" @endif>{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Recent News -->
                            <div class="blog-list-left-heading">
                                <h4>Recent News</h4>
                            </div>

                            @foreach ($recent_post as $post)

                                <div class="latest-posts">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-4 latest-posts-img">
                                            <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/80x80' }}" alt="blog-img" style=" width: 75px; height: 75px;">
                                        </div>

                                        <div class="col-md-7 col-sm-7 col-8 latest-posts-text pl-0">
                                            <a href="{{route('showPost', $post->id)}}">{{$post->title}}</a>
                                            <span>{{$post->created_at->format('M d, Y')}}</span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            <!-- Tags -->
                            <div class="blog-list-left-heading">
                                <h4>Tags</h4>
                            </div>

                            <div class="mt-10">
                                @foreach ($tags as $tag)
                                    <a class="button-tag primary-button" href="#">{{$tag->name}}</a>
                                @endforeach
                            </div>

                            <!--Share Links -->
                            <div class="blog-list-left-heading">
                                <h4>Share Links</h4>
                            </div>
                            <div class="blog-share">
                                <ul>
                                    <li><a href="https://www.facebook.com/DaVinci147"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="comming Soon"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/daavinci147"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" title="comming Soon"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- Right Side END -->

                </div>
                    <!-- Row END -->

            </div>
            <!-- Container END -->
        </div>
        <!-- Blog Post END -->

    @endsection

    </x-home-master>
