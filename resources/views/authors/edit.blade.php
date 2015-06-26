@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('authors.edit') }}</h1>
    </div>

    <form action="{{ action('AuthorsController@handleEdit') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $author->id }}">

        <div class="form-group">
            <label for="firstname">{{ trans('authors.firstname') }}</label>
            <input type="text" class="form-control" name="firstname" value="{{ $author->firstname }}" />
        </div>
        <div class="form-group">
            <label for="lastname">{{ trans('authors.lastname') }}</label>
            <input type="text" class="form-control" name="lastname" value="{{ $author->lastname }}" />
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('general.editAction') }}</button>
        <a href="{{ action('AuthorsController@index') }}" class="btn btn-link">{{ trans('general.cancel') }}</a>
    </form>
@stop