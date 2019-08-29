<nav class="navbar navbar-expand-sm navbar-light border-bottom" style="background-color:#f7f7f7 ;">
    @if(Auth::user() && Auth::user()->type=='admin')
    <div id="content">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-danger" >
                    <span>Menu</span>
                </button>
            </div>
    </div>
    @else
    <img class="img-fluid img-thumbnail rounded-top" src="/images/rfsworld.png" width="45" height="40">
    @endif

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @guest
            @include('other.nav') @else @if(Auth::user()->type=='admin')
            @include('admin.nav') @else @if(Auth::user()->type=='salesman')
            @include('salesman.nav') @endif @endif @endguest
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


            <li class="nav-item dropdown divider">
                <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4 px-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" v-pre>
                    Welcome {{ Auth::user()->name }}
                    <span class="caret"></span>
                  </a>

                <div class="dropdown-menu dropdown-menu-right divider" aria-labelledby="navbarDropdown">
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
                <a class="nav-link" href="/about" style="color:black;"> Help</a>
            </li>
        </ul>
    </div>
</nav>
