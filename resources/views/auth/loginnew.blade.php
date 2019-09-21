@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        font-family: 'Varela Round', sans-serif;
        background: #fff;

    }

    .modal {
        height: 800px;
        position: relative;
        /* left: 50%;
        top: 50%;
        /* padding: 50%; */
        /* margin-left: -300px;
        margin-top: -300px;  */
        width: 90%;
        max-width: 450px;
    }

    /* .modal-login {
        color: #434343;
        width: 350px;
    } */

    .modal-login .modal-content {
        /* padding: 20px; */
        border-radius: 1px;
        border: none;
        position: relative;
    }

    .modal-login .modal-header {
        border-bottom: none;
        height: 200px;
        background-color: #CA0106;
    }

    .modal-login h4 {
        text-align: center;
        font-size: 22px;
        margin-bottom: -10px;
    }

    .modal-login .avatar i {
        font-size: 62px;
    }

    .modal-login .form-control,
    .modal-login .btn {
        min-height: 40px;
        border-radius: 1px;
        transition: all 0.5s;
    }


    .modal-login .btn {
        background: #FB6E9D;
        border: none;
        line-height: normal;
    }

    .modal-login .btn:hover,
    .modal-login .btn:focus {
        background: #fb3c7a;
    }

</style>

<div class="text-center">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Login Modal</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade ">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/images/logo3.png" style="width:150px">
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf <div class="form-group">
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif </div>
                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required autocomplete="current-password"> @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span> @endif </div>

                    <div class="form-group">
                        <button type="submit" class="btn">
                            {{ __('Login') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
        $('#myModal').modal({backdrop: 'static', keyboard: false})

</script>

@endsection
