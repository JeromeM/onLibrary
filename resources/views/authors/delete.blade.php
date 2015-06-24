@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $author->firstname . ' ' . $author->lastname }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('AuthorsController@handleDelete') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="author" value="{{ $author->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('AuthorsController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop