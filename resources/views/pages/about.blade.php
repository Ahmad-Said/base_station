@extends('layouts.app')
@section('content')
<h1>
    Help
</h1>
<div>
    <div class="form-group">
        <br>

        @if(Auth::user() && Auth::user()->type=='admin')

        {!! Form::open(['action'=>['PagesController@storeAbout'],'method' =>'POST']) !!}
        <div class="form-group">
            {{ Form::textarea('body',$help_setting->value,['id'=>'article-ckeditor','class'=>'form-control hidden','placeholder'=>'Body Text']) }}
        </div>

        <div class="text-center">

            {{ Form::submit('Submit Changes',['class'=>'bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg']) }}

        </div>
        {!! Form::close() !!}
    </div>
    <script>
        // live preview change on ckeditor
            $(document).ready(function(){
                editor.on( 'change', function( evt ) {
                    // https://ckeditor.com/docs/ckeditor4/latest/guide/dev_savedata.html
                // getData() returns CKEditor's HTML content.
                      $('#help').html(evt.editor.getData());
                      $('#help > table').addClass("table-bordered table table-striped");
                 });

             }
            )
    </script>
    {{-- End admin section --}}
    @endif
    <script>
        $(document).ready(function(){
        $('table').addClass("table-bordered table table-striped");
    })
    </script>

    @if(Auth::user() && Auth::user()->type=='admin')

    <h4>Live Preview</h4>
    <div class="card">
        <div class="card-body">
            <p class="card-text" id="help">
            </p>
        </div>
    </div>
    <br>
    <h4 class="text-center"> Old Help </h4>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                {!! $help_setting->value !!}
            </p>
        </div>
    </div>
    <div>
        <hr>
        @if(Auth::guest())
        <a href='/'>
            @else
            <a href={{ URL::previous() }}>
                @endif
                <button style="float: left; color: blue"
                    class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                    Go Back
                </button>
            </a>

            @auth
            <a href="/home">
                @else
                <a href="/">
                    @endauth
                    <button style="float: right; color: blue"
                        class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                        Go Home
                    </button>
                </a>
    </div>
</div>
</div>
@endsection
