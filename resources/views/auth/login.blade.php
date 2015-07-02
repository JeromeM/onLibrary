@extends('layout')

@section('content')
    <form method="POST" action="/login" class="form-horizontal" name="loginForm">
        {!! csrf_field() !!}

        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Login to Your Account</h1><br>

                <p id="emailInputError" class="text-danger" style="display:none;"></p>
                <input type="text" name="email" placeholder="Email"/>

                <p id="passwordInputError" class="text-danger" style="display:none;"></p>
                <input type="password" name="password" placeholder="Password"/>

                <input type="checkbox" name="remember" id="remember"/><p id="label-remember">Remember me</p>
                <input type="submit" name="login" class="login loginmodal-submit" value="Login"/>

                <div class="login-help">
                    <a href="{{ action('Auth\AuthController@getRegister') }}">Register</a> - <a href="{{ action('PasswordController@getEmail') }}">Forgot Password</a>
                </div>
            </div>
        </div>

    </form>
@stop