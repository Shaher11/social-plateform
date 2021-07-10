<x-home-master>
@section('extra-style')
    <style>
        .search-blog input[type=text] {
            font-size: 17px;
            border-bottom: 1px solid red;
            box-shadow: 0 1px 0 0 red;
        }

        .search-blog input:focus {
            outline: red;
        }

        .search-blog .fa {
            font-size: 20px;
            margin-top: 2%;
            margin-left: 2%;
            color: red;
        }
    </style>
@endsection
@section('content')

    <!-- Page Title START -->
    <div class="container">
        <div class="page-title-section" style="background-image: url({{asset('images/Blog.png')}});">
                {{-- <h1>Blog Grid</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog-grid.html">Blog Grid</a></li>
                </ul> --}}
            </div>
        </div>
        <!-- Page Title END -->


        <!-- Blog Grid START -->
        <div class="section-block-grey pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                    </div>

                    <div class="col-md-4 col-xs-8">
                        <div id="search-input">
                                <div class="input-group search-blog">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input type="text" class="form-control" id="search" placeholder="Search"/>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row blog-start">

                    @include('components.search.blogSearch', ['posts' => $posts])

                </div>
                {{ $posts->links() }}
                </div>

        </div>
        <!-- Blog Grid END -->


        {{-- ///////////////////////////////////// Partner Section ////////////////////////////////////////////////// --}}
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



@endsection
@section('javascript')
        <script type="text/javascript">
            $(document).ready( function () {
                $('#datatable').DataTable();
            } );
            $('#search').keyup(function(){
                var value = $(this).val();
                console.log(value);
                $.ajax({
                    type : 'get',
                    url : '{{URL::route('blogs.search')}}',
                    data:{search:value},
                    success:function(data){
                        console.log(data);
                        $('.blog-start').html(data);
                    }
                });
            });

        </script>
    @endsection
</x-home-master>
