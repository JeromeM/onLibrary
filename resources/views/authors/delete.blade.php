@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('authors.delete') }} {{ $author->firstname . ' ' . $author->lastname }} <small>{{ trans('general.confirm') }}</small></h1>
    </div>
    <form action="{{ action('AuthorsController@handleDelete') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="author" value="{{ $author->id }}" />
        <button type="submit" class="btn btn-danger">{{ trans('general.yes') }}</button>
        <a href="{{ action('AuthorsController@index') }}" class="btn btn-default">{{ trans('general.no') }}</a>
    </form>
@stop