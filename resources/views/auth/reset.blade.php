@extends('layout')

@section('content')
    <form method="POST" action="{{ action('Auth\PasswordController@postReset') }}" class="form-horizontal" name="passwordLostForm">
        {!! csrf_field() !!}

        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Password Lost</h1><br>

                <p>Please enter your email and a new password.</p><br/>

                <p id="emailInputError" class="text-danger" style="display:none;"></p>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>

                <input type="text" name="password" placeholder="Password"/>
                <input type="text" name="password_confirmation" placeholder="Confirm Password"/>

                <input type="submit" name="passwordlost" class="login loginmodal-submit" value="Reset Password"/>

            </div>
        </div>

    </form>
@stop