@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('books.delete') }} {{ $book->title }} <small>{{ trans('books.confirm') }}</small></h1>
    </div>
    <form action="{{ action('BooksController@handleDelete') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $book->id }}" />
        <button type="submit" class="btn btn-danger">{{ trans('general.yes') }}</button>
        <a href="{{ action('BooksController@index') }}" class="btn btn-default">{{ trans('general.no') }}</a>
    </form>
@stop