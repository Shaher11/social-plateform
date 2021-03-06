<x-admin-master>

    @section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tags</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control search" id="search" placeholder="Search for...">
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
                            <h2>Tags Table <small>Tags</small></h2>


                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="{{route('admin.tags.create')}}" ><i class="fa fa-plus "></i></a>
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
                                        @if(Session::has('tag_message'))
                                            <div class="alert alert-success alert-dismissible " role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span>
                                                </button>
                                                <strong>{{session('tag_message')}}</strong>
                                            </div>

                                        @elseif(Session::has('tag_deactivate_message'))

                                            <div class="alert alert-warning alert-dismissible " role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span>
                                                </button>
                                                <strong>{{session('tag_deactivate_message')}}</strong>
                                            </div>
                                        @endif


                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tags Name</th>
                                                <th>Created</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                                @include('components.search.tagsSearch', ['tags' => $tags])
                                            </tbody>
                                        </table>
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
                    url : '{{URL::route('tags.search')}}',
                    data:{search:value},
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            });

        </script>
    @endsection
</x-admin-master>
