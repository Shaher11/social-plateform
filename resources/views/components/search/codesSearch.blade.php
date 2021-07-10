@foreach($codes as $code)
    <tr>
        <td>{{$code->id}}</td>
        <td>{{$code->promo_code}}</td>
        
        <td>{{$code->duration}} Days</td>
        <td>{{$code->discount}}%</td>
        <td>{{$code->created_at->diffForhumans()}}</td>
        <td>
            @if($code->status ==1)
                {!! Form::model($code, ['method'=>'PATCH', 'action'=> ['AdminCodeController@update', $code->id] ]) !!}
    
                <input type="hidden" name="status" value="0">
    
                <button type="submit" class="btn btn-success">Deactivate</button>
    
                {!! Form::close() !!}
            @else
    
                {!! Form::model($code, ['method'=>'PATCH', 'action'=> ['AdminCodeController@update', $code->id] ]) !!}
    
                <input type="hidden" name="status" value="1">
    
                <button type="submit" class="btn btn-warning">Activate</button>
    
                {!! Form::close() !!}
    
            @endif
            </td>
        <td>
            <div class="row">
            
                <a href="{{route('admin.codes.show', $code->id)}}" class="btn btn-info"><i class="fa fa-eye info"></i></a>
                <a href="{{route('admin.codes.edit', $code->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a>

            </div>
        </td>
    </tr>
@endforeach
