@if($users)
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->full_name}}</a></td>
            <td>{{$user->user_name}}</td>
            <td>{{$user->email}}</td>

            @if($user->role_id == 1)
                <td><span class="badge badge-danger">{{$user->role ? $user->role->name : 'User has no role'}}</span></td>
            @elseif($user->role_id == 2)
                <td><span class="badge badge-success">{{$user->role ? $user->role->name : 'User has no role'}}</span></td>
            @else
                <td><span class="badge badge-warning">{{$user->role ? $user->role->name : 'User has no role'}}</span></td>
            @endif
            <td> @if($user->status ==1)
                {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id] ]) !!}

                <input type="hidden" name="status" value="0">

                <button type="submit" class="btn btn-success">Deactivate</button>

                {!! Form::close() !!}
            @else

                {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id] ]) !!}

                <input type="hidden" name="status" value="1">

                <button type="submit" class="btn btn-warning">Activate</button>

                {!! Form::close() !!}

            @endif</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>
                <div class="row">

                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a>

                    {!! Form::model($user, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['AdminUserController@destroy',  $user ] ]) !!}


                    <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                    {!! Form::close() !!}

                </div>
            </td>
        </tr>
    @endforeach
@endif
