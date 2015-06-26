@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ trans('authors.list') }}</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('AuthorsController@create') }}" class="btn btn-primary">{{ trans('authors.create') }}</a>
        </div>
    </div>

    @if ($authors->isEmpty())
        <p>{{ trans('authors.noauthor') }}</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ trans('authors.firstname') }}</th>
                <th>{{ trans('authors.lastname') }}</th>
                <th>{{ trans('general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->firstname }}</td>
                    <td>{{ $author->lastname }}</td>
                    <td>
                        <a href="{{ action('AuthorsController@edit', $author->id) }}" class="btn btn-default">{{ trans('general.editAction') }}</a>
                        <a href="{{ action('AuthorsController@delete', $author->id) }}" class="btn btn-danger">{{ trans('general.deleteAction') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop