@foreach($tags as $tag)
    <tr>
        <td>{{$tag->id}}</td>
        <td>{{Str::limit($tag->name, 20)}}</td>
        <td>{{$tag->created_at->diffForhumans()}}</td>
        <td>
            <div class="row">
                <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a>

                {!! Form::model($tag, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['AdminTagController@destroy',  $tag ] ]) !!}


                <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                {!! Form::close() !!}

            </div>
        </td>
    </tr>
@endforeach