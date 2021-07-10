
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{Str::limit($category->name, 20)}}</td>

            <td>{{$category->created_at->diffForhumans()}}</td>

            <td>
                <div class="row">
                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a>

                    @if($category->enable ==1)
                        {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoryController@update', $category->id] ]) !!}

                        <input type="hidden" name="enable" value="0">

                        <button type="submit" class="btn btn-success">Deactivate</button>

                        {!! Form::close() !!}
                    @else

                        {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoryController@update', $category->id] ]) !!}

                        <input type="hidden" name="enable" value="1">

                        <button type="submit" class="btn btn-warning">Activate</button>

                        {!! Form::close() !!}

                    @endif
                </div>
            </td>

            {{-- <td>
                <div class="row">
                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning ml-2"><i class="fa fa-edit warning"></i></a>

                    {!! Form::model($category, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure?');", 'action'=> ['AdminCategoryController@destroy',  $category ] ]) !!}


                    <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                    {!! Form::close() !!}

                </div>
            </td> --}}
        </tr>
    @endforeach
