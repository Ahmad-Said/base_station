@extends('layouts.style')
@section('bodysection')
<!-- Scripts -->
<div id="app">
    {{-- <br><br> --}}
    {{-- <div class="container-fluid"> --}}
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

        {{-- </div> --}}
</div>

@endsection


