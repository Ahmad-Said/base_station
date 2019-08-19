<nav class="navbar navbar-expand-md navbar-dark  fixed-top" style="padding-left:1em; padding-right:5em; background-color: gray;">
    @if(Auth::user() && Auth::user()->type=='admin')
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-danger" >
                    <i class="fas fa-align-left"></i>
                    <span>Menu</span>
                </button>
            </div>
        </nav>
    </div>
    @else
    &nbsp&nbsp
    <img class="img-fluid img-thumbnail rounded-top" src="/images/rfsworld.png" width="45" height="40">
    @endif
    <a class="navbar-brand" href="/">&nbsp&nbspRFS WORLD</a>
    {{-- <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a> --}}

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        {{-- style="padding-left: 500px;" --}}
        <ul class="navbar-nav mr-auto">
            @guest
    @include('other.nav') @else @if(Auth::user()->type=='admin')
    @include('admin.nav') @else @if(Auth::user()->type=='salesman')
    @include('salesman.nav') @endif @endif @endguest

        </ul>

        {{--
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form> --}}

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


            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" style="color:azure;" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/home">
                        Home
                      </a>
                    <a class="dropdown-item" href="/profile">
                        Profile
                      </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
            <li class="nav-item">
                <a class="nav-link" href="/about" style="color:aliceblue;"> About us</a>
            </li>
        </ul>
    </div>
</nav>
