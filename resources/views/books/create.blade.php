@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('books.add') }}</h1>
    </div>

    <div class="alert alert-danger hidden" id="errorMessage"></div>

    <form name="bookCreateForm" action="{{ action('BooksController@handleCreate') }}" method="post" role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">{{ trans('books.title') }}</label>
            <input type="text" class="form-control" name="title" />
        </div>
        <div class="form-group">
            <label for="author">{{ trans('books.author') }}</label>
            <select name="author" class="form-control">
                @foreach (onLibrary\Models\Authors::allSorted() as $author)
                    <option value="{{ $author->id }}">{{ $author->firstname . ' ' . $author->lastname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('general.createAction') }}</button>
        <a href="{{ action('BooksController@index') }}" class="btn btn-link">{{ trans('general.cancel') }}</a>
    </form>
@stop