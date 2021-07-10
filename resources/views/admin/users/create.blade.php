<x-admin-master>




@section('content')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create User</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
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
                        <h2>Create User <small>Davinci employees</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="{{route('admin.users.index')}}" ><i class="fa fa-arrow-left"></i></a>
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


                            {!! Form::open(['method'=>'POST', 'action'=> 'AdminUserController@store','files'=>true]) !!}

                            <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                {{ csrf_field() }}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="full_name" >Full Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                         <input type="text" id="full_name" name="full_name" required="required" class="form-control ">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">User Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="user_name" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Phone <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                            <input type="phone" id="phone" class="form-control" name="phone" data-parsley-trigger="change" required />
                                        </div>
                                    </div>
                                </div>

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
                                        <input type="radio" class="flat" name="status" id="genderM" value="1"  checked required />
                                        Not Active:
                                        <input type="radio" class="flat" name="status" id="genderF" value="0" />
                                    </div>

                                </div>
                            </div>

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
                                {{-- <input class="form-control" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />--}}

                                {{--  <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >--}}
                                {{-- <i id="slash" class="fa fa-eye-slash"></i>--}}
                                {{-- <i id="eye" class="fa fa-eye"></i>--}}
                                {{-- </span>--}}
                                {!! Form::password('password', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.users.index') }}">
                                            Cancel
                                        </a>
                                        {{-- <button class="btn btn-primary" type="button">Cancel</button> --}}
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </div>
                            {!! Form::close() !!}
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
