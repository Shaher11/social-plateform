@foreach($contacts as $contact)
    <tr>
        <td>{{$contact->id}}</td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->subject}}</td>

        <td>{{Str::limit($contact->body, 60)}}</td>

        <td>{{$contact->created_at->diffForhumans()}}</td>
        <td>{{$contact->updated_at->diffForhumans()}}</td>

        <td>
            {{-- {{$contact->status}} --}}
            @if($contact->status ==1)
                {!! Form::model($contact, ['method'=>'PATCH', 'action'=> ['AdminContactController@update', $contact->id] ]) !!}

                <input type="hidden" name="status" value="0">

                <button type="submit" class="btn btn-success">Recieved</button>

                {!! Form::close() !!}
            @else

                {!! Form::model($contact, ['method'=>'PATCH', 'action'=> ['AdminContactController@update', $contact->id] ]) !!}

                <input type="hidden" name="status" value="1">

                <button type="submit" class="btn btn-warning">Non Recieved</button>

                {!! Form::close() !!}

            @endif
            
        </td>


        <td>
            <div class="row">
            
                {{-- <a href="{{route('admin.posts.show', $contact->id)}}" ><i class="fa fa-eye"></i></a>--}} 
            
                <a href="{{route('admin.contacts.show', $contact->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>

                {{-- <a href="{{route('admin.contacts.edit', $contact->id)}}" class="btn btn-warning" > <i class="fa fa-edit warning"></i></a> --}}


                {!! Form::model($contact, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['AdminContactController@destroy',  $contact->id] ]) !!}


                <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                {!! Form::close() !!}

            </div>


        </td>
    </tr>
@endforeach