@extends('layouts.style')
@section('bodysection')

@if(Auth::user()!=null && Auth::user()->type=='admin')
@include('admin.sidebar')
@endif
<div id="main">
    @if(Auth::user()!=null)
    @include('inc.navbar')
    @endif
    <br><br>
    <div class="container-fluid">
        @include('inc.messages')
        @yield('content')
    </div>
</div>
@endsection
