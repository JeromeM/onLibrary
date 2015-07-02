@extends('layout')

@section('content')

    <form method="POST" action="{{ action('Auth\PasswordController@postEmail') }}" class="form-horizontal" name="passwordLostForm">
        {!! csrf_field() !!}

        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Password Lost</h1><br>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif

                <p>Fill your Email address and we will send you a new password.</p><br/>

                <p id="emailInputError" class="text-danger" style="display:none;"></p>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"/>

                <input type="submit" name="passwordlost" class="login loginmodal-submit" value="Send"/>

            </div>
        </div>

    </form>
@stop