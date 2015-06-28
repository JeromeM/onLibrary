@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('authors.add') }}</h1>
    </div>

    <div class="alert alert-danger hidden" id="errorMessage"></div>

    <form name="authorCreateForm" action="{{ action('AuthorsController@handleCreate') }}" method="post" role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="firstname">{{ trans('authors.firstname') }}</label>
            <input type="text" class="form-control" name="firstname" />
        </div>
        <div class="form-group">
            <label for="lastname">{{ trans('authors.lastname') }}</label>
            <input type="text" class="form-control" name="lastname" />
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('general.createAction') }}</button>
        <a href="{{ action('AuthorsController@index') }}" class="btn btn-link">{{ trans('general.cancel') }}</a>
    </form>
@stop