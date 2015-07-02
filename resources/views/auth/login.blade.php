@extends('layout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ action('Auth\AuthController@postLogin') }}" class="form-horizontal" name="loginForm">
        {!! csrf_field() !!}

        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Login to Your Account</h1><br>

                <p id="emailInputError" class="text-danger" style="display:none;"></p>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>

                <p id="passwordInputError" class="text-danger" style="display:none;"></p>
                <input type="password" name="password" placeholder="Password"/>

                <input type="checkbox" name="remember" id="remember"/><p id="label-remember">Remember me</p>
                <input type="submit" name="login" class="login loginmodal-submit" value="Login"/>

                <div class="login-help">
                    <a href="{{ action('Auth\AuthController@getRegister') }}">Register</a> - <a href="{{ action('Auth\PasswordController@getEmail') }}">Forgot Password</a>
                </div>
            </div>
        </div>

    </form>
@stop