@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit book</h1>
    </div>

    <form action="{{ action('BooksController@handleEdit') }}" method="post" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $book->id }}">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $book->title }}" />
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <select name="author" class="form-control">
                @foreach (onLibrary\Models\Authors::all() as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->firstname . ' ' . $author->lastname }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('BooksController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop