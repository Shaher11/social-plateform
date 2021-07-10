<x-user-master>
    @section('content')
    <div class="section-block">
        <div class="container">
          <div class="section-heading center-holder">
            <h3>Edit Your Account</h3>
            <div class="section-heading-line"></div>
            @foreach ($errors->all() as $error)
                <div style="font-size: 15px">{{ $error }}</div>
            @endforeach
          </div>
          <div class="row mt-50">
            <div class="col-md-2 col-sm-2 col-12">
            </div>
            <div class="col-md-4 col-sm-4 col-12 text-center">
                <img src="{{Auth::user()->photo ? Auth::user()->photo->file: asset('/images/user.png') }} "  alt="{{Auth::user()->user_name}}" class="rounded-circle"   width="200rem" height="200rem">
                <h2 class="mt-3">{{ Auth::user()->full_name }}</h2>
                @if (Auth::user()->role_id == 3)
                    <div  class="text-dark mt-3 "><span >Job title: Developer</span></div>
                @endif
            </div>
      
            <div class="col-md-4 col-sm-4 col-12">
              <!-- Form Start -->
              <form class="contact-form" action="{{route('users.update', ['user' => $user->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <label for="" class="text-dark">Full Name</label>
                    <input type="text" name="full_name" placeholder="Full Name" value="{{$user->full_name}}">
                  </div>
      
                  <div class="col-md-12">
                    <label for="" class="text-dark">Email</label>
                    <input type="text" name="email" placeholder="Email" value="{{$user->email}}">
                  </div>
                  
                  <div class="col-md-12">
                    <label for="" class="text-dark">Phone</label>
                    <input type="text" name="phone" placeholder="Phone" value="{{$user->phone}}">
                  </div>

                  <div class="col-md-12">
                    <label for="" class="text-dark">Password</label>
                    <input type="password" name="password"  value="">
                  </div>
                  
                  <div class="col-md-12">
                    <div class="center-holder">
                      <button type="submit">Save Changes</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- Form End -->
            </div>
            <div class="col-md-2 col-sm-2 col-12">
            </div>
          </div>
        </div>
      </div>
    @endsection
</x-user-master>