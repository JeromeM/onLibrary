@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Listing of all books</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('BooksController@create') }}" class="btn btn-primary">Add book</a>
        </div>
    </div>

    @if ($books->isEmpty())
        <p>There are no books! :(</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->firstname . ' ' . $book->author->lastname}}</td>
                    <td>
                        <a href="{{ action('BooksController@edit', $book->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('BooksController@delete', $book->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop