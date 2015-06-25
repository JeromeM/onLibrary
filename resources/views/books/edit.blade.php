@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('books.edit') }}</h1>
    </div>

    <div class="alert alert-danger hidden" id="errorMessage"></div>

    <form name="bookEditForm" action="{{ action('BooksController@handleEdit') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $book->id }}">

        <div class="form-group">
            <label for="title">{{ trans('books.title') }}</label>
            <input type="text" class="form-control" name="title" value="{{ $book->title }}" />
        </div>
        <div class="form-group">
            <label for="author">{{ trans('books.author') }}</label>
            <select name="author" class="form-control">
                @foreach (onLibrary\Models\Authors::all() as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->firstname . ' ' . $author->lastname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('books.editAction') }}</button>
        <a href="{{ action('BooksController@index') }}" class="btn btn-link">{{ trans('books.cancel') }}</a>
    </form>
@stop