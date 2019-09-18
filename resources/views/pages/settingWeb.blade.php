@extends('layouts.app')
@section('content')
<h1>
    Setting Algorithm
</h1>
<div>
    <div class="form-group text-center">
        <br>
        {{-- Just making look as toggle button
            https://www.bootstraptoggle.com/
             --}}
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <style>
            .toggle.ios,
            .toggle-on.ios,
            .toggle-off.ios {
                border-radius: 20px;
            }

            .toggle.ios .toggle-handle {
                border-radius: 20px;
            }
        </style>
        {!! Form::open(['action'=>['SettingWebLaraController@store'],'method' =>'POST']) !!}
        Cache Result:
        @if($allSetting["CACHE_RESULT"]->value=="true")
        <input id="CACHE_RESULT" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"
            data-onstyle="success" data-offstyle="info" data-size="small" data-style="ios" name="CACHE_RESULT" checked>

        @else
        <input id="CACHE_RESULT" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"
            data-onstyle="success" data-offstyle="info" data-size="small" data-style="ios" name="CACHE_RESULT">
        @endif
        {{ Form::submit('Save Setting',['class'=>'bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg']) }}

        {!! Form::close() !!}


        <br>
        {!! Form::open(['action'=>['SettingWebLaraController@clearCachedResult'],'method' =>'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        Cache control:
        {{ Form::submit('Clear Cache',['class'=>'btn btn-danger uppercase',"onclick" => "alert("]) }}

        {!! Form::close() !!}



        <br>
        {!! Form::open(['action'=>['SettingWebLaraController@triggerUpdateProvidedData'],'method' =>'PUT']) !!}

        Last data updated: {{ $allSetting["LAST_ANTENNA_DATA_PROVIDED"]->updated_at }}

        {{ Form::submit('Trigger update',['class'=>'bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg']) }}

        {!! Form::close() !!}

    </div>


    <hr>
    <a href={{ URL::previous() }}>
        <button style="float: left; color: blue"
            class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
            Go Back
        </button>
    </a>

    <a href="/home">
        <button style="float: right; color: blue"
            class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
            Go Home
        </button>
    </a>
</div>
@endsection
