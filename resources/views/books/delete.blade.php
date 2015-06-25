@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $book->title }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('BooksController@handleDelete') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $book->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('BooksController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop