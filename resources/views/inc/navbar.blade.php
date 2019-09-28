<nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color:#f7f7f7 ;">
    @if(Auth::user() && Auth::user()->type=='admin')
    <div id="content">
        <button onclick="openNav()" class="btn btn-danger openbtn">Menu</button>
    </div>
    @else
    <img class="img-fluid img-thumbnail rounded-top" src="/images/rfsworld.png" width="45" height="40">
    @endif

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @if(Auth::user())@if(Auth::user()->type=='customer')
            @include('customer.nav') @else @if(Auth::user()->type=='admin')
            @include('admin.nav') @else @if(Auth::user()->type=='salesman')
            @include('salesman.nav') @endif @endif @endif @endif
        </ul>

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

            @endif @else

            {{-- <div class="dropdown"> --}}
            <li class="dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    Welcome {{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile">
                        Profile
                    </a>
                    @if(Auth::user()!=null && (Auth::user()->type=='customer' || Auth::user()->type=='salesman'))
                    <a class="dropdown-item" href="/posts">Posts</a>
                    <a class="dropdown-item" href="/about" style="color:black;">Help</a>
                    @endif
                    @if(Auth::user()!=null && (Auth::user()->type=='salesman'))
                    <a class="dropdown-item" href={{ route('QueryLog') }}>
                          Query History</a>

                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            {{-- </div> --}}

            @endguest

        </ul>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
