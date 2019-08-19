@extends('layouts.app')
@section('content')

    <a href="/posts" class="btn btn-outline-primary bg-light ">Go Back</a>
    <br>
    <br>
    <h1>{{ $post->title }}</h1>
    @if($post->cover_image!=null)
    <img style="width:75%; height: 75%; border-radius: 2%; border-width: 5px;" src="/storage/cover_images/{{ $post->cover_image }}">
    @endif
    <div>
        {!! $post->body !!}
    </div>
    <br><small>Written on {{ $post->created_at }}</small>
    <br>
    @if(Auth::user() && Auth::user()->type=='admin')
    <hr>
    <a href="{{ $post->id }}/edit" class="btn btn-warning float-lg-left">Edit</a>
    {!! Form::open(['action'=> ['PostsController@destroy', $post->id],'method'=>'POST','class'=>'float-sm']) !!}
     &nbsp;|{{ Form::hidden ('_method','DELETE')}}
    {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
    {!! Form::close() !!}
    <br>
    <br>
    <br>
    @endif
@endsection
