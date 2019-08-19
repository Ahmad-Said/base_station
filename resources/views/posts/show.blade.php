@extends('layouts.app')
@section('content')

    <a href="/posts" class="btn btn-outline-primary bg-light ">Go Back</a>
    <br>
    <br>
    <h1>{{ $post->title }}</h1>
    <small>Written on {{ $post->created_at }}</small>
    <div>
        {!! $post->body !!}
    </div>
    <br>
    @if(Auth::user() && Auth::user()->type=='admin')
    <hr>
    <a href="posts/{{ $post->id }}/edit" class="btn btn-warning float-lg-left">Edit</a>
    {!! Form::open(['action'=> ['PostsController@destroy', $post->id],'method'=>'POST','class'=>'float-sm']) !!}
     &nbsp;|{{ Form::hidden ('_method','DELETE')}}
    {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
    {!! Form::close() !!}
    @endif
@endsection
