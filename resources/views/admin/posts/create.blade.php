<x-admin-master>

    @section('content')

    @include('includes.tinyeditor')

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Create Post</h3>
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
                                <h2>Create Post <small>different form elements</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a href="{{route('admin.posts.index')}}" ><i class="fa fa-arrow-left"></i></a>
                                    </li>
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>


                        @if(Auth::check())
                            <div class="x_content">
                                <br />
                                    {!! Form::open(['method'=>'POST','id'=>'demo-form2', 'action'=>'AdminPostController@store','files'=>true, 'class'=>'form-horizontal form-label-left' ]) !!}

                                    @csrf

                                {{-- <input type="hidden" class="flat" name="user_id" value="{{$user->id}}"  /> --}}

                                <div class="item form-group ">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title: <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="first-name" name="title" required="required" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Author: <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        {!! Form::select('user_id', [''=>'Choose Author'] + $users , null, ['class'=>'form-control'])!!}
                                    </div>
                                </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tags: <span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                                                @foreach($tags as $tag)
                                                    <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                                                @endforeach

                                            </select>


                                            <p class="help-block"></p>
                                            @if($errors->has('tag'))
                                                <p class="help-block">
                                                    {{ $errors->first('tag') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 label-align">Categories:*</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 label-align">Status:</label>
                                        <div class="col-md-6 col-sm-6 mt-2">
                                            Active:
                                            <input type="radio" class="flat" name="status" id="active" value="1" checked  />
                                            Not Active:
                                            <input type="radio" class="flat" name="status" id="notActive" value="0" />

                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 label-align">Photo:</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            {{-- <div class="form-group">
                                                {!! Form::label('photo_id', 'Photo:') !!} --}}
                                                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                                            {{-- </div> --}}
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Body:</label>
                                        <div class="col-md-8 col-sm-8 ">

                                            <div id="alerts"></div>
                                            <div class="comment-form" >
                                                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
                                            </div>
                                            <br />
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.posts.index') }}">
                                                Cancel
                                            </a>
                                            {{-- <button class="btn btn-primary" type="button">Cancel</button> --}}
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                            </div>

                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection


        @section('scripts')
            @parent

            <script type="text/javascript">
                $('.select2-multi').select2();
            </script>
{{--
                $("#selectbtn-tag").click(function(){
                    $("#selectall-tag > option").prop("selected","selected");
                    $("#selectall-tag").trigger("change");
                });
                $("#deselectbtn-tag").click(function(){
                    $("#selectall-tag > option").prop("selected","");
                    $("#selectall-tag").trigger("change");
                });

                $(document).ready(function () {
                    $('.select2').select2();
                }); --}}



        @stop
</x-admin-master>


