@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->type=='admin')
    @include('admin.home') @else @if(Auth::user()->type=='salesman')
    @include('salesman.home') @else
    @include('other.home') @endif @endif
        </div>
    </div>
</div>
@endsection
