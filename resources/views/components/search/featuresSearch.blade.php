@foreach($features as $feature)
    <tr>
        <td>{{$feature->id}}</td>
        <td>{{Str::limit($feature->feature_name, 20)}}</td>
        <td>
            @foreach ($feature->featuersTypes as $type)
                {{Str::limit($type->types->type_name, 20)}},
            @endforeach
        </td>
        <td>{{Str::limit($feature->description, 60)}}</td>
        <td>{{$feature->feature_cost}}.00$</td>
        <td>{{$feature->created_at->diffForhumans()}}</td>
        <td>

            <div class="row">
               
                <a href="{{route('admin.features.edit', $feature->id)}}" class="btn btn-warning ml-2"><i class="fa fa-edit warning"></i></a>

                @if($feature->enable ==1)
                    {!! Form::model($feature, ['method'=>'PATCH', 'action'=> ['AdminFeatureController@update', $feature->id] ]) !!}

                    <input type="hidden" name="enable" value="0">

                    <button type="submit" class="btn btn-success">Deactivate</button>

                    {!! Form::close() !!}
                @else

                    {!! Form::model($feature, ['method'=>'PATCH', 'action'=> ['AdminFeatureController@update', $feature->id] ]) !!}

                    <input type="hidden" name="enable" value="1">

                    <button type="submit" class="btn btn-warning">Activate</button>

                    {!! Form::close() !!}
                @endif

            </div>

        </td>
        
    </tr>
@endforeach
