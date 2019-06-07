@extends('layouts.style')
@section('bodysection')
<!-- Scripts -->


<div id="app">
    @include('inc.navbar')
    <br><br>
    <div class="container">
        <main class="py-4">
    @include('inc.messages') @yield('content')
        </main>
    </div>
</div>
@endsection
