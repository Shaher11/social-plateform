<x-admin-master>
    @section('content')
        @if(count($comments) > 0)
            <div class="right_col" role="main">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>comments</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
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


                                                <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Posts</th>
                                                        <th>comments</th>
                                                        <th>Author</th>
                                                        <th>Email</th>
                                                        <th>Create date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>



                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    @foreach($comments as $comment)

                                                        <tr>
                                                            <td>{{$comment->id}}</td>
                                                            {{-- <td> <img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>--}}

                                                            {{--  <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->full_name}}</a></td>--}}
                                                            <td>{{Str::limit($comment->post->title, 20)}}</td>

                                                            <td>{{Str::limit($comment->body,60)}}</td>

                                                            <td>{{$comment->author}}</td>
                                                            <td>{{$comment->email}}</td>

                                                            {{-- <td>{{$comment->status == 1 ? 'Active' : 'Not Active' }}</td>--}}

                                                            <td>{{$comment->created_at->diffForHumans()}}</td>

                                                            <td>

                                                                @if($comment->status ==1)
                                                                    {!! Form::model($comment, ['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id] ]) !!}

                                                                    <input type="hidden" name="status" value="0">

                                                                    <button type="submit" class="btn btn-success">Un approve</button>

                                                                    {!! Form::close() !!}
                                                                @else

                                                                    {!! Form::model($comment, ['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id] ]) !!}

                                                                    <input type="hidden" name="status" value="1">

                                                                    <button type="submit" class="btn btn-warning">approve</button>

                                                                    {!! Form::close() !!}

                                                                @endif
                                                            </td>

                                                            <td>
                                                                <div class="row">

                                                                    <a href="{{route('showPost',$comment->post->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>


                                                                    {!! Form::model($comment, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['PostCommentsController@destroy', $comment->id] ]) !!}


                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                                                                    {!! Form::close() !!}

                                                                </div>
                                                            </td>


                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    @else
                                        <h1 class="text-center">No Comments</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @stop

</x-admin-master>
