<x-user-master>
    @section('content')
  <!-- Service Boxes START -->
  <div class="section-block" style="padding: 50px 0px 50px 0px;">
    <div class="container">
      <div class="section-heading center-holder">
        <h4 class="text-capitalize">Hi {{Auth::user()->user_name}},</h4>
        <h4>Welcome to your dashboard</h4>
        <div class="section-heading-line"></div>
      </div>
      <div class="row mt-50">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="service-block">
            <img src="{{asset('img\new\banners\About.png')}}" alt="service" >
            <div class="clearfix">
              <div class="service-block-number">
                {{-- <h5>01</h5> --}}
              </div>
              <div class="service-block-title">
                <a href="{{route('orders.index')}}"> <h4>Orders</h4></a>
              </div>
            </div>
            <p>See Your Orders and follow them</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="service-block">
              <img src="{{asset('img\new\banners\Blog.png')}}" alt="service">
              <div class="clearfix">
                <div class="service-block-number">
                  {{-- <h5>02</h5> --}}
                </div>
                <div class="service-block-title">
                  <a href="{{route('posts')}}">  <h4>Blog</h4></a>
                </div>
              </div>
              <p>See Our Blog Posts Here</p>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="service-block">
              <img src="{{asset('img\new\banners\Contact.png')}}" alt="service">
              <div class="clearfix">
                <div class="service-block-number">
                  {{-- <h5>03</h5> --}}
                </div>
                <div class="service-block-title">
                  <a href="{{route('contacts')}}"> <h4>Contact Us</h4></a>
                </div>
              </div>
              <p>Edit your profile Info here</p>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="service-block">
              <img src="{{asset('img\new\banners\Settings.png')}}" alt="service" >
              <div class="clearfix">
                <div class="service-block-number">
                </div>
                <div class="service-block-title">
                  <a href="{{route('users.edit', ['user' => Auth::id()])}}"> <h4>Settings</h4> </a>
                </div>
              </div>
              <p>Edit your profile Info here</p>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- Service Boxes END -->
    @endsection
</x-user-master>