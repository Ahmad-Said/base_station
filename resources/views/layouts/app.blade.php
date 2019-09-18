@extends('layouts.style')
@section('bodysection')
<!-- Scripts -->
{{-- <div id="app">
        @include('inc.navbar')
        <div class="row ">
            @if(Auth::user()!=null && Auth::user()->type=='admin')
            @include('admin.sidenav')
            @endif
            <main class="col">
                    <div class="container">
                            <br><br>
                            @include('inc.messages')
                            @yield('content')
                        </div>
                    </main>
                    <br />
                </div>

</div> --}}

@if(Auth::user()!=null && Auth::user()->type=='admin')
    @include('admin.sidebar')
@endif
    <div id="main">
        @include('inc.navbar')
        <br><br>
        <div class="container-fluid">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>
@endsection


