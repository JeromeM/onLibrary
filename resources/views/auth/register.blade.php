@extends('layout')

@section('content')
    <form method="POST" action="/register" class="form-horizontal" name="registerForm">
        {!! csrf_field() !!}

        <div class="modal-dialog">
            <div class="registermodal-container">
                <h1>Create an account</h1><br>

                <p id="emailInputError" class="text-danger" style="display:none;"></p>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>

                <p id="passwordInputError" class="text-danger" style="display:none;"></p>
                <input type="password" name="password" placeholder="Password"/>

                <p id="passwordConfirmInputError" class="text-danger" style="display:none;"></p>
                <input type="password" name="password_confirmation" placeholder="Password confirmation"/>

                <input type="submit" name="login" class="register registermodal-submit" value="Register"/>

            </div>
        </div>

    </form>
@stop