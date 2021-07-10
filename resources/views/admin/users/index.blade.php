<x-admin-master>
@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control search" id="search" placeholder="Search for...">
                            <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Users</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="{{route('admin.users.create')}}" ><i class="fa fa-plus "></i></a>
                                </li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">



                            <div class="x_content">

                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Clients</a>
                                    </li>
                                 
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Admins</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Full Name</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Role</th>
                                                                <th>Status</th>
                                                                <th>Create date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @include('components.search.usersSearch', ['users' => $users])
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-7">
                                                        {{$users->render()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Full Name</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Role</th>
                                                                <th>Status</th>
                                                                <th>Create date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @include('components.search.usersSearch', ['users' => $clients])
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-7">
                                                        {{$clients->render()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Full Name</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Role</th>
                                                                <th>Status</th>
                                                                <th>Create date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @include('components.search.usersSearch', ['users' => $developers])
                                                        </tbody>
                                                    </table>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Full Name</th>
                                                                <th>User Name</th>
                                                                <th>Email</th>
                                                                <th>Role</th>
                                                                <th>Status</th>
                                                                <th>Create date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @include('components.search.usersSearch', ['users' => $admins])
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5"></div>
                                                    <div class="col-7">
                                                        {{$admins->render()}}
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
            </div>
            <div class="row">
                @include('includes.form_error')
            </div>
        </div>
    </div>
@stop

@section('extra-script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
        $('#search').keyup(function(){
            var value = $(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::route('users.search')}}',
                data:{search:value},
                success:function(data){
                    // console.log(data);
                    $('tbody').html(data);
                }
            });
        });

    </script>
@endsection
</x-admin-master>
