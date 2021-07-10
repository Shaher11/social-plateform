@foreach($orders as $order)
    <tr
        @if(($order->latest_status()->name == "pending" || $order->latest_status()->name == "processing") && ($today >$order->delivered_at || $order->delivered_at != null)) {
            class="table-warning"
        }
        @elseif ($order->latest_status()->name == "pending") {
            class="table-primary"
        }
        @elseif ($order->latest_status()->name == "need_details") {
            class="table-info"
        }
        @elseif($order->latest_status()->name == "finished") {
            class="table-success"
        }
        @elseif($order->latest_status()->name == "cancelled") {
            class="table-dark"
        }
        @endif
    id="{{$order->id}}">

    <td>{{$order->id}}</td>
        <td>{{Str::limit($order->web_site->name, 20)}}</td>
        <td>{{Str::limit($order->web_site->name, 20)}}</td>
        <td>
            @foreach ($order->web_site->featureWebsites as $feature)
                {{Str::limit($feature->features->feature_name, 20)}},
            @endforeach
        </td>
        <td>
            <input type="date" class="delivered_at" name="delivered_at" id="delivered_at" data-id="{{$order->id}}" class="p-2" value="{{$order->delivered_at}}">
        </td>
        <td>{{$order->cost}}.00$</td>
        <td>
            <select class="form-control status" id="status-{{$order->id}}" data-id="{{$order->id}}" name="status">
                <option value="1" @if($order->latest_status()->name == 'pending') selected @endif>Pending</option>
                <option value="2" @if($order->latest_status()->name == 'processing') selected @endif>Processing</option>
                <option value="3" @if($order->latest_status()->name == 'need_details') selected @endif>Need Details</option>               
                <option value="5" @if($order->latest_status()->name == 'cancelled') selected @endif>Cancelled</option>
                <option value="4" @if($order->latest_status()->name == 'finished') selected @endif>Finished</option>
            </select>
        </td>
        <td>{{Str::limit($order->user->user_name, 20)}}</td>
        <td>
            <select class="form-control developer" id="developer_id-{{$order->id}}" name="developer_id" data-id="{{$order->id}}">
                @isset($order->developer)
                    <option value="{{$order->developer->id}}" disabled selected>{{Str::limit($order->developer->user_name, 20)}}</option>
                @else
                    <option value="" disabled selected>Please select Developer</option>
                @endisset
                @foreach($developers as $developer)
                    <option value="{{$developer->id}}">{{ $developer->user_name }}</option>
                @endforeach
            </select>

        </td>
        <td>{{$order->created_at->diffForhumans()}}</td>
        <td>
            <div class="row">
                {{-- <a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-warning"><i class="fa fa-edit warning"></i></a> --}}
                <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-info"><i class="fa fa-eye info"></i></a>

                {!! Form::model($order, ['method'=>'DELETE','onsubmit' => "return confirm('Are you sure you want to Cancel the Order?');", 'action'=> ['AdminOrderController@destroy',  $order ] ]) !!}


                <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button>

                {!! Form::close() !!}

            </div>
        </td>
    </tr>
@endforeach
