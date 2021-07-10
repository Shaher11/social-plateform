@foreach($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td> <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="{{Str::limit($post->title, 10)}}" ></td>

        <td>{{Str::limit($post->title, 30)}}</td>

        <td>{{ Str::limit($post->body, 100) }}</td>

        <td><a href="{{ route('admin.comments.show',$post->id) }}">

            <span class="badge badge-dark" > {{ $post->comments->count() }} - show </span>

        </a></td>

        @isset($post->category)
            <td>{{Str::limit($post->category->name, 20)}}</td>
        @else
            <td>{{Str::limit($post->category, 20)}}</td>
        @endisset

        <td field-key='tag'>
            @foreach ($post->tags as $singleTag)
                <span class="badge badge-info ">{{ $singleTag->name }}</span>
            @endforeach
        </td>

        <td>{{$post->user ? $post->user->user_name : "No author"}}</td>
        <td>{{$post->created_at->diffForhumans()}}</td>

        {{-- <td>{{$post->status}}</td> --}}
        <td>
            @if($post->recent == 1)
                {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@add_to_latest', $post->id] ]) !!}

                <input type="hidden" name="recent" value="0">

                <button type="submit" class="btn btn-success">Not Recent</button>

                {!! Form::close() !!}
            @else

                {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@add_to_latest', $post->id] ]) !!}

                <input type="hidden" name="recent" value="1">

                <button type="submit" class="btn btn-warning">Recent</button>

                {!! Form::close() !!}

            @endif

        </td>
        <td>
            @if($post->status ==1)
                {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@update', $post->id] ]) !!}

                <input type="hidden" name="status" value="0">

                <button type="submit" class="btn btn-success">Un Show</button>

                {!! Form::close() !!}
            @else

                {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@update', $post->id] ]) !!}

                <input type="hidden" name="status" value="1">

                <button type="submit" class="btn btn-warning">Show</button>

                {!! Form::close() !!}

            @endif

        </td>
        <td>
            <div class="row">
                <a href="{{route('showPost',$post->id)}}" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a>


                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a>


                {!! Form::model($post, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['AdminPostController@destroy',  $post->id] ]) !!}


                <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                {!! Form::close() !!}

            </div>
        </td>
    </tr>
@endforeach


