

@if(count($errors) > 0 )

    {{-- <div class="row"> --}}

        <ul>

            <blockquote class="blockquote">

                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach

            </blockquote>
            
        </ul>

    {{-- </div> --}}

@endif
