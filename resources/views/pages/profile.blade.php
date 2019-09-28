@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <h1>Profile
                {{-- @if (auth()->user()->type == "admin") --}}
                <button type="button" class="btn btn-success btn-sm add text-center"><span
                        class="fas fa-edit"></span></button>

                <script>
                    $(document).ready(function(){
                    $(document).on('click', '.add',function(){

                                $('.edit').prop("disabled", !$('#name').prop("disabled"));
                                $('#subupdate').prop("hidden",$('#name').prop("disabled"));

                            });

                 });
                </script>
                {{-- @endif --}}
            </h1>
            {!! Form::open(['action' => ['ProfileController@update', $a->id] , 'method' => 'PUT', 'enctype' =>
            'multipart/form-data']) !!}
            <small>ID:{{ $a->id }} </small>
            <input type="hidden" name='userid' value="{{ $a->id }}">
            <input type="hidden" name='type' value="{{ $a->type }}">
            <input type="hidden" name='organization' value="{{ $a->organization }}">
            <input type="hidden" name='email' value="{{ $a->email }}">




            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name</h5>
                    <p class="card-text">
                        <div class="form-group">
                            <input name="name" id="name" disabled="disabled" class="form-control edit" type="text"
                                value="{{ $a->name }}">
                        </div>
                    </p>
                </div>
            </div>

            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Password</h5>
                <p class="card-text">
                    <div class="form-group">
                        <input name="password" disabled="disabled" class="form-control edit" type="password"
                            value="{{ $a->password }}">
                    </div>
                </p>
            </div>
        </div>
        <div class="form-group">
                <div class="card-header">
                    <h4 style=' display: inline-block;'>Type: &nbsp &nbsp &nbsp &nbsp <label>{{$a->type}} </label></h4>
                </div>
            </div>
            <div class="form-group">
                    <div class="card-header">
                        <h4 style=' display: inline-block;'>Email: &nbsp &nbsp &nbsp &nbsp <label>{{$a->email}} </label></h4>
                    </div>
                    </div>

            <div class="form-group">
                <div class="card-header">
                    <h4 style=' display: inline-block;'>Organization: &nbsp &nbsp &nbsp &nbsp
                        <label>{{$a->organization}} </label></h4>
                </div>
            </div>
            <div class="text-right">
                {{Form::submit('Update', ['class'=>'btn btn-primary' ,'id' =>'subupdate','hidden' ])}}
            </div>
            <br><br>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
