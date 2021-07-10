@extends('layouts.app')

@section('content')
    <div>
   {{-- <a class="hiddenanchor" id="signup" ></a>
   <a class="hiddenanchor" id="signin" ></a> --}}

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <img src="{{url('img/logos/Davinci-big.png')}}" class="main_logo" alt="logo" id="main_logo" style="width:70%;  margin: 5px 0 20px;">

                <form method="POST" action="{{ route('login') }}">
                    @csrf 
                {{-- <h1><i class="fa fa-spinner"></i> Da-<span style="color: #d21e2b;">vinci</span></h1> --}}
                    <h1>Login Form</h1>
                    <br>

                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                    </div>
                    <div>
                        <button class="btn btn-block text-light mb-5" id="login-btn" type="submit" >{{ __('Login') }}</button>
                        
                        OR
                        <a href="{{ route('social.oauth', 'google') }}" class="btn btn-block " id="registration-log">
                            <i class="fa fa-google" ></i>Continue with google
                        </a>
                         {{-- <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-block">
                            Login with Facebook
                        </a> --}}
                        <br>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="{{ route('register') }}" class="to_register" style="color: #d21e2b; font-weight: bold;"> Create Account </a>
                            @if (Route::has('password.request'))
                                <a class="text-dark" href="{{ route('password.request') }}">Forget your password?</a>
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div>
                            {{-- <h1><i class="fa fa-spinner"></i> Da-vinci</h1> --}}
                        {{-- <img src="{{url('img/new/logos/davenci_nav.png')}}" class="main_logo" alt="logo" id="main_logo"> --}}
                            <p class="m-0 p-0">©2020 All Rights Reserved. Da-vinci.</p><p class="m-0 p-0"> Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>

        </div>


    </div>
</div>








@endsection
