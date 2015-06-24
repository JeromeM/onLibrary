@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Add a book</h1>
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

    <form action="{{ action('BooksController@handleCreate') }}" method="post" role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="firstname" />
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <select name="author" class="form-control">
                @foreach (onLibrary\Models\Authors::allSorted() as $author)
                    <option value="{{ $author->id }}">{{ $author->firstname . ' ' . $author->lastname }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('BooksController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop