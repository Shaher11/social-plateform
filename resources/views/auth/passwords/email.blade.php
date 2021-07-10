@extends('layouts.app')

@section('content')
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf 
                    <h1>Reset Password</h1>
                    <br>

                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-block text-light mb-3" style="background-color: #d21e2b;">
                                    {{ __('Send Password Reset Link') }}
                        </button>                        
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            {{-- <h1><i class="fa fa-spinner"></i> Da-vinci</h1> --}}
                                <img src="{{url('img/new/logos/davenci_nav.png')}}" class="main_logo mt-3 mb-3" alt="logo" id="main_logo">
                            <p class="m-0 p-0">©2020 All Rights Reserved. Da-vinci.</p><p class="m-0 p-0"> Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>

        </div>
    </div>
</div>

@endsection
