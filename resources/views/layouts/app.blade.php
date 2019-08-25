@extends('layouts.style')
@section('bodysection')
<!-- Scripts -->
<div id="app">
    <br><br>
    <div class="container-fluid">
        <div class="row ">
                @include('inc.navbar')
                    @if(Auth::user()!=null && Auth::user()->type=='admin')
                        @include('admin.sidenav')
                    @endif
                    <main class="col">
                        <div class="container">
                            <br><br><br>
                            @include('inc.messages')
                            @yield('content')
                        </div>
                    </main>
                    <br />
                </div>

        </div>
</div>

@endsection


