
    @foreach($types as $type)
        <tr>
            <td>{{$type->id}}</td>
            <td>{{Str::limit($type->type_name, 20)}}</td>
            <td>{{Str::limit($type->description, 60)}}</td>
            <td>{{$type->created_at->diffForhumans()}}</td>

            <td>
                <div class="row">
                    {{-- <a href="{{route('showPost',$post->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a> --}}

                    <a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a>

                    {{-- {!! Form::model($type, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['AdminTypeController@destroy',  $type ] ]) !!}


                    <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                    {!! Form::close() !!} --}}

               
         

                    @if($type->enable ==1)
                        {!! Form::model($type, ['method'=>'PATCH', 'action'=> ['AdminTypeController@update', $type->id] ]) !!}

                        <input type="hidden" name="enable" value="0">

                        <button type="submit" class="btn btn-success">Deactivate</button>

                        {!! Form::close() !!}
                    @else

                        {!! Form::model($type, ['method'=>'PATCH', 'action'=> ['AdminTypeController@update', $type->id] ]) !!}

                        <input type="hidden" name="enable" value="1">

                        <button type="submit" class="btn btn-warning">Activate</button>

                        {!! Form::close() !!}

                    @endif

                </div>
            </td>


        </tr>
    @endforeach
