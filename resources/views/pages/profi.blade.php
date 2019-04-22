@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <h1>Profile</h1>
            {!! Form::open(['action' => 'PagesController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <small>ID:{{$a->id}} </small>
            <input type="hidden" name='id' value="{{$a->id}}">
            <div class="form-group">
                <div class="card-header">Name <input type='text' class='form-control' name='name' value="{{$a->name}}"> </input>
                </div>


            </div>
            <div class="form-group">
                <div class="card-header">Email: <input type='text' class='form-control' name='email' value={{$a->email}} ></input>
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
                    {{Form::submit('Update', ['class'=>'btn btn-primary' ])}}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
