<x-admin-master>

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Posts</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Posts Table <small>Posts</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="{{route('admin.posts.create')}}" ><i class="fa fa-plus "></i></a>
                            </li>

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    @if(Session::has('post_message'))
                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>{{session('post_message')}}</strong>
                                        </div>

                                    @elseif(Session::has('post_delete_message'))

                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>{{session('post_delete_message')}}</strong>
                                        </div>

                                    @elseif(Session::has('post_edit_message'))

                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>{{session('post_edit_message')}}</strong>
                                        </div>

                                    @endif

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Comments</th>
                                            <th>Category</th>
                                            <th>Tags</th>
                                            <th>Author</th>
                                            <th>Created</th>
                                            <th>Recent Post</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                            @include('components.search.postsSearch', ['posts' => $posts])
                                        </tbody>
                                    </table>


                                </div>

                                <div class="row">
                                    <div class="col-5"></div>
                                    <div class="col-7">
                                        {{$posts->render()}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


    @endsection

    @section('extra-script')
        <script type="text/javascript">
            $(document).ready( function () {
                $('#datatable').DataTable();
            } );
            $('#search').keyup(function(){
                var value = $(this).val();
                console.log(value);
                $.ajax({
                    type : 'get',
                    url : '{{URL::route('posts.search')}}',
                    data:{search:value},
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            });

        </script>
    @endsection
</x-admin-master>
