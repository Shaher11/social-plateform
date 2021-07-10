<x-admin-master>


@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit User</h3>
                </div>

                {{-- <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
						</span>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create User <small>blue developments employees</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="{{route('admin.users.index')}}" ><i class="fa fa-back "></i></a>
                                </li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />


                            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id],'files'=>true]) !!}

                            <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                {{ csrf_field() }}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="full_name" >Full Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="full_name" name="full_name" required="required" class="form-control" value="{{$user->full_name}}">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">User Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="user_name" required="required" class="form-control" value="{{$user->user_name}}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" value="{{$user->email}}" />
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" name="phone" data-inputmask="'mask' : '(999) 999-9999' " value="{{$user->phone}}">
                                    </div>
                                </div>

                                @if(auth()->user()->id != $user->id)
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 label-align">Role</label>
                                        <div class="col-md-6 col-sm-6 ">

                                            {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control'])!!}

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 label-align">Status</label>
                                        <div class="col-md-6 col-sm-6 mt-2">
                                            Active:
                                            <input type="radio" class="flat" name="status" id="genderM" value="1"  @if($user->status == 1) checked @endif/>
                                            Not Active:
                                            <input type="radio" class="flat" name="status" id="genderF" value="0"  @if($user->status == 0) checked @endif />
                                        </div>

                                        </div>
                                    </div>
                                @endif

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="btn-group">
                                            <input type="file" name="photo_id" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                                        </div>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        {!! Form::password('password', ['class'=>'form-control'])!!}
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">

                                    <div class="col-md-1 col-sm-1 offset-md-3">

                                        <button type="submit" class="btn btn-success">Update</button>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-1 col-sm-1 ">

                                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUserController@destroy', $user->id]]) !!}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {!! Form::close() !!}
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

    <div class="row">
        @include('includes.form_error')
    </div>

@stop
</x-admin-master>
