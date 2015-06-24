@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Listing of all authors</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('AuthorsController@create') }}" class="btn btn-primary">Create Author</a>
        </div>
    </div>

    @if ($authors->isEmpty())
        <p>There are no authors! :(</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->firstname }}</td>
                    <td>{{ $author->lastname }}</td>
                    <td>
                        <a href="{{ action('AuthorsController@edit', $author->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('AuthorsController@delete', $author->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop