@extends('layouts.app')
@section('content')
<h1>
    Setting Algorithm
</h1>
<br>
@include('inc.checkBoxAsSlider')
<style>
    .table-striped>tbody>tr:nth-child(n)>td,
    .table-striped>tbody>tr:nth-child(n)>th {
        background-color: #F7F7F7;
    }
</style>
<div class="text-center table-responsive">

    <table class="table table-borderless">
        <tr>

            <th>Property</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        {!! Form::open(['action'=>['SettingWebLaraController@store'],'method' =>'POST']) !!}
        {{-- Cache Result Enable Section --}}
        <tr style="background-color: #F7F7F7">
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
                <i class="fas fa-level-down-alt"></i>
            </td>
        </tr>

        {{-- Allowed Error margin Section --}}
        <tr style="background-color: #F7F7F7">
            <td>
                <div class="form-group">
                    <label for="LIMIT_ROW_PER_QUERY">Solutions count Per page in results</label>
            <td>
                <input id="LIMIT_ROW_PER_QUERY" class="form-control" type="number" min="0"
                    name="LIMIT_SOLUTION_PER_PAGE_RESULT"
                    value={{ $allSetting["LIMIT_SOLUTION_PER_PAGE_RESULT"]->value }}>
            </td>
            <td>
                <i class="fas fa-level-down-alt"></i>
            </td>
        </tr>

        {{-- Limit Row Per query Section --}}
        <tr style="background-color: #F7F7F7">
            <td>
                <div class="form-group">
                    <label for="LIMIT_ROW_PER_QUERY">Limit Row Per query</label>
            <td>
                <input id="LIMIT_ROW_PER_QUERY" class="form-control" type="number" min="1" name="LIMIT_ROW_PER_QUERY"
                    value={{ $allSetting["LIMIT_ROW_PER_QUERY"]->value }}>
            </td>
            <td>
                {{ Form::submit('Save Setting',
                        ['class'=>'bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg',"style" => "vertical-align: middle;"]) }}

                {!! Form::close() !!}
            </td>
        </tr>

        {{-- Cache control Section --}}
        <tr>
            <td>
                {!! Form::open(['action'=>['SettingWebLaraController@clearCachedResult'],'method' =>'POST']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                Cache control:
            </td>
            <td>
                <a href="{{ url('QueryLog') }}"><i class="far fa-question-circle"></i></a>

                {{ $allSetting["cacheResultTableInfo"]->Rows }} Queries
                Using {{ $allSetting["cacheResultTableInfo"]->Data_length/1024/1024  }} MB
            </td>
            <td>

                {{ Form::submit('Clear Cache',['class'=>'btn btn-danger uppercase']) }}

                {!! Form::close() !!}
            </td>
        </tr>

        {{-- Trigger update Section --}}
        <tr>
            <td>
                Last data updated
            </td>
            <td>
                {{ $allSetting["LAST_ANTENNA_DATA_PROVIDED"]->updated_at->format("d/m/y  h:i A") }}
            </td>
            <td>
                <a href="/provideAntennasData"
                    class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                    Trigger update
                </a>
            </td>
        </tr>
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
