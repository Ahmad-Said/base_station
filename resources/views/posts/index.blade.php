@extends('layouts.app')
@section('content')
<h1>Posts</h1>
<br>
@if(count($posts) >= 1)
@foreach ($posts as $post )
<a href="posts/{{ $post->id }}">
    <div class="card card-body bg-light">
        <h3>{{ $post->title }}</h3>
        <small>Written on {{ $post->created_at }}</small>
    </div>
    <hr>
</a>
@endforeach
{{ $posts->links() }}
@else
<p>No Posts Found</p>

@endif
@endsection
