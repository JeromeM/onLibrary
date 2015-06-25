<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
 * Base routing
 */
Route::get('/', 'IndexController@index');


/**
 * Authors
 */
// Bind parameter author to Authors model
Route::model('author', 'onLibrary\Models\Authors');
// Show pages
Route::get('/authors', 'AuthorsController@index');
Route::get('/author/create', 'AuthorsController@create');
Route::get('/author/edit/{author}', 'AuthorsController@edit');
Route::get('/author/delete/{author}', 'AuthorsController@delete');
// Form submission
Route::post('/author/create', 'AuthorsController@handleCreate');
Route::post('/author/edit', 'AuthorsController@handleEdit');
Route::post('/author/delete', 'AuthorsController@handleDelete');


/**
 * Books
 */
// Bind parameter
Route::model('book', 'onLibrary\Models\Books');
// Show pages
Route::get('/books', 'BooksController@index');
Route::get('/books/create', 'BooksController@create');
Route::get('/books/edit/{book}', 'BooksController@edit');
Route::get('/books/delete/{book}', 'BooksController@delete');
// Form submission
Route::post('/books/create', 'BooksController@handleCreate');
Route::post('/books/edit', 'BooksController@handleEdit');
Route::post('/books/delete', 'BooksController@handleDelete');
// Ajax Validation
Route::post('/books/validate', 'BooksController@bookValidate');