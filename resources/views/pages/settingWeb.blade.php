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

            /* The switch - the box around the slider */
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #fd0e35;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #fd0e35;
            }

            input:checked+.slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
        <table class=" table table-borderless">
            <tr>

                <th>Property</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            {!! Form::open(['action'=>['SettingWebLaraController@store'],'method' =>'POST']) !!}
            <tr>
                <td>
                    Cache Result:
                </td>
                <td>
                    <?php $boole = $allSetting["CACHE_RESULT"]->value=="true";?>
                    <label class="switch">
                        @if($boole)
                        <input id="switchCache" type="checkbox" name="CACHE_RESULT" checked>
                        @else
                        <input id="switchCache" type="checkbox" name="CACHE_RESULT">
                        @endif
                        <span class="slider round"></span>
                    </label>
                    @if($boole)
                    <span id="afterswtich" class="alert alert-danger small Bold">

                        Enabled

                        @else
                        <span id="afterswtich" class="alert alert-dark small Bold">
                            Disabled
                            @endif
                        </span>
                        <script>
                            $(document).ready(function() {
                                $i=0;
                            $("#switchCache").click(function() {
                                $i++;
                                if($("#afterswtich").html().trim() == "Enabled"){
                                    $("#afterswtich").html("Disabled");
                                }else{
                                    $("#afterswtich").html("Enabled");
                                }
                                if($i%2==0){
                                    $("#afterswtich").toggleClass("alert-dark");
                                    $("#afterswtich").toggleClass("alert-danger");
                                }else{
                                    $("#afterswtich").toggleClass("alert-dark");
                                    $("#afterswtich").toggleClass("alert-danger");
                                }
                            });
                        });
                        </script>

                </td>

                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="LIMIT_ROW_PER_QUERY">Limit Row Per query</label>
                <td>
                    <input id="LIMIT_ROW_PER_QUERY" class="form-control" type="number" min="1"
                        name="LIMIT_ROW_PER_QUERY" value={{ $allSetting["LIMIT_ROW_PER_QUERY"]->value }}>
                </td>
                <td>
                    {{ Form::submit('Save Setting',
                        ['class'=>'bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg',"style" => "vertical-align: middle;"]) }}

                </td>
                {!! Form::close() !!}
    </div>

    </td>
    </tr>


    <br>
    <tr>
        <td>
            {!! Form::open(['action'=>['SettingWebLaraController@clearCachedResult'],'method' =>'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            Cache control:
        </td>
        <td>
            {{ $allSetting["cacheResultTableInfo"]->Rows }} Queries
            Using {{ $allSetting["cacheResultTableInfo"]->Data_length/1024/1024  }} MB
        </td>
        <td>

            {{ Form::submit('Clear Cache',['class'=>'btn btn-danger uppercase']) }}

            {!! Form::close() !!}
        </td>
    </tr>



    <br>
    <tr>

        <td>

            {!! Form::open(['action'=>['SettingWebLaraController@triggerUpdateProvidedData'],'method' =>'PUT']) !!}

            Last data updated
        </td>
        <td>
            {{ $allSetting["LAST_ANTENNA_DATA_PROVIDED"]->updated_at }}
        </td>
        <td>
            {{ Form::submit('Trigger update',['class'=>'bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg']) }}

            {!! Form::close() !!}
        </td>
    </tr>

</div>
</table>

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
