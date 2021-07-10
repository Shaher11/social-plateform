<x-admin-master>

    @section('content')

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Create Type</h3>
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
                                <h2>Create Type <small>different form elements</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a href="{{route('admin.tags.index')}}" ><i class="fa fa-arrow-left"></i></a>
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="font-size: 15px">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    {!! Form::open(['method'=>'POST','id'=>'demo-form2', 'action'=>'AdminTagController@store','files'=>true, 'class'=>'form-horizontal form-label-left' ]) !!}

                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tag Name: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="first-name" name="name" required="required" class="form-control ">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.tags.index') }}">
                                                Cancel
                                            </a>
                                            {{-- <button class="btn btn-primary" type="button">Cancel</button> --}}
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
</x-admin-master>


