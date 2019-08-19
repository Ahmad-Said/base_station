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
<div class="btn-group" role="group" aria-label="Basic example">

    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning float-lg-left far fa-edit"> Edit</a>
    <button type="button" class="btn btn-danger float-lg-left" data-toggle="modal" data-target="#ConfirmDelete">
        <span class="fas fa-exclamation-circle"> Delete</span>
    </button>
</div>
@endif

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
    aria-hidden="true">
    {!! Form::open(['action'=> ['PostsController@destroy', $post->id],'method'=>'POST','class'=>'float-sm']) !!}
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal-dialog modal-sm modal-notify modal-danger modal-confirm" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <div class="icon-box">
                    <i class="fas fa-skull-crossbones"> Are you sure?</i>
                </div>
            </div>
            <!--Body-->
            <div class="modal-body">
                <i class="fas fa-times fa-4x animated rotateIn"></i>
                <br>
                <p>Do you really want to delete this Post?<br> This process cannot be undone.</p>
            </div>
            <div class="card-footer flex-center">
                <button type="button" class="btn  btn-info waves-effect float-left" data-dismiss="modal">No</button>
                <button type="submit" class="btn  btn-danger waves-effect float-right">Yes</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
    </form>
</div>
<!-- /Modal: modalConfirmDelete -->



@endsection
