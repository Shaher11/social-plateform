<header >
    <nav id="navigation4" class="container navigation">
        <div class="nav-header">
            <a class="nav-brand" href="{{route('home')}}">
                <img src="{{url('img/logos/Untitled-2.png')}}" class="main-logo" alt="logo" id="main_logo">
            </a>
            <div class="nav-toggle"></div>
        </div>
        <div class="nav-menus-wrapper">
            <ul class="nav-menu align-to-right">
                <li><a href="{{route('home')}}">Home</a></li>

                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{Auth::user()->avatar}}"  alt="{{Auth::user()->user_name}}" class="rounded-circle" width="35rem" height="35rem">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->role_id == 1)
                            <a class="dropdown-item" href="/">Profile</a>
                        @else
                            <a class="dropdown-item" href="{{route('users.dashboard')}}">Profile</a>
                        @endif
                        <a class="dropdown-item" href="{{route('users.edit', ['user' => Auth::id()])}}">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
<!-- Navbar END -->
