@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Add an author</h1>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ action('AuthorsController@handleCreate') }}" method="post" role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" />
        </div>
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" />
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('AuthorsController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop