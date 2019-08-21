@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    <br>
    @if(count($posts) >= 1)
    @foreach ($posts as $post )
    <a href="posts/{{ $post->id }}">
        <div class="card card-body bg-light">
            <div class="row">
                @if($post->cover_image!="noimage.jpg")
            <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/cover_images/{{ $post->cover_image }}">
                </div>
            @endif
            <div class="col-md-8 col-sm-8">
                    <h3>{{ $post->title }}</h3>
                    <small>Written on {{ $post->created_at }}</small>
                </div>
            </div>
        </div>
        <hr>
    </a>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No Posts Found</p>

@endif
@endsection
