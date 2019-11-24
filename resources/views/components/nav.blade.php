<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Cross-Link') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li> <a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                @hasanyrole('UserAdmin|Admin')
                <li> <a class="nav-link" href="{{ url('/user') }}">Users List</a></li>
                @endrole
                @role('Admin')
                <li> <a class="nav-link" href="{{ url('/bookmark') }}">BookMarks</a></li>
                <li> <a class="nav-link" href="{{ url('/tag') }}">Tags</a></li>
                @endrole
                @role('User|UserAdmin')
                <li> <a class="nav-link" href="{{ url('/bookmark') }}">BookMarks</a></li>
                @endrole
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">
                            @role('User')
                            @if (file_exists(public_path().'/upload/avatars/'.Auth::user()->profile->avatar))
                                <img src="/upload/avatars/{{Auth::user()->profile->avatar}}" style="width:30px; height:30px;">
                                @else
                                <img src="/upload/avatars/default.png" style="width:30px; height:30px;">
                            @endif

                            @endrole
                            {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
