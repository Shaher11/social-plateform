@extends('layouts.app')

@section('content')

<div id="register" class="animate  form container" style="max-width: 350px; margin-top: 5%">
    <section class="login_content">

        <img src="{{url('img/logos/Davinci-big.png')}}" class="main_logo" alt="logo" id="main_logo" style="width:70%;  margin: 5px 0 20px;">

        <form method="POST" {{ route('register') }}>
            @csrf
            <h1>Create Account</h1>

            <div>
                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>

                @error('full_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 

            <div>
                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" placeholder="User Name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 

            <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>

            <div>
                <button class="btn btn-block text-light mb-3 " id="login-btn" type="submit" >{{ __('Register') }}</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Already a member ?
                    <a href="{{ route('login') }}" class="to_register" style="color: #d21e2b; font-weight: bold;"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <div>
                    {{-- <h1><i class="fa fa-spinner"></i> Da-vinci</h1> --}}
                    <p class="m-0 p-0">©2020 All Rights Reserved. Da-vinci.</p><p class="m-0 p-0"> Privacy and Terms</p>
                </div>
            </div>
        </form>
    </section>
</div>



@endsection