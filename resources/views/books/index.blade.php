@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('books.list') }}</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('BooksController@create') }}" class="btn btn-primary">{{ trans('books.add') }}</a>
        </div>
    </div>

    @if ($books->isEmpty())
        <p>{{ trans('books.nobook') }}</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('books.title') }}</th>
                <th>{{ trans('books.author') }}</th>
                <th>{{ trans('books.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->firstname . ' ' . $book->author->lastname}}</td>
                    <td>
                        <a href="{{ action('BooksController@edit', $book->id) }}" class="btn btn-default">{{ trans('books.editAction') }}</a>
                        <a href="{{ action('BooksController@delete', $book->id) }}" class="btn btn-danger">{{ trans('books.deleteAction') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop