@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Author</h1>
    </div>

    <form action="{{ action('AuthorsController@handleEdit') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $author->id }}">

        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" value="{{ $author->firstname }}" />
        </div>
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" value="{{ $author->lastname }}" />
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('AuthorsController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop