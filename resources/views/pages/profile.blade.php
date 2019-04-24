@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <h1>Profile
                <button type="button" class="btn btn-success btn-sm add text-center"><span class="fas fa-edit"></span></button>
            </h1>
            <script>
                $(document).ready(function(){
                    $(document).on('click', '.add',function(){

                                $('.edit').prop("disabled", !$('#email').prop("disabled"));
                                $('#subupdate').prop("hidden",$('#email').prop("disabled"));

                            });

                 });
            </script>
            {!! Form::open(['action' => ['ProfileController@update', $a->id] , 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            <small>ID:{{ $a->id }} </small>
            <input type="hidden" name='id' value="{{ $a->id }}">




            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <p class="card-text">
                        <div class="form-group">
                            <input name="name" disabled="disabled" class="form-control edit" type="text" value="{{ $a->name }}">
                        </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Email


                        <a href="mailto:{{ $a->email }}?Subject=Hello%20again" target="_top">
                                <button type="button" class="btn btn-primary btn-sm float-right">
                                    <span class="fas fa-envelope"> </span>
                                </button>
                            </a>
                    </h5>
                    <div class="form-group">
                        <input id="email" name="email" title="example@rfsworld.com" class="form-control edit" disabled="disabled" type="text" value="{{ $a->email }}"
                            pattern=".*@rfsworld.com">
                    </div>
                </div>
            </div>

            <div class="form-group">
                {{--
                <div class="card-header">
                    <h4 style=' display: inline-block;'>Type: </h4>
                    </label> --}}
                    <div class="card-header">
                        <h4 style=' display: inline-block;'>Type: &nbsp &nbsp &nbsp &nbsp <label>{{$a->type}} </label></h4>
                    </div>

                </div>
                <div class="text-right">
                    {{Form::submit('Update', ['class'=>'btn btn-primary' ,'id' =>'subupdate','hidden' ])}}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
