<?php


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
// Ajax
Route::post('/author/validate', 'AuthorsController@authorValidate');



/**
 * Books
 */
// Bind parameter
Route::model('book', 'onLibrary\Models\Books');
// Show pages
Route::get('/books', 'BooksController@index');
Route::get('/book/create', 'BooksController@create');
Route::get('/book/edit/{book}', 'BooksController@edit');
Route::get('/book/delete/{book}', 'BooksController@delete');
// Form submission
Route::post('/book/create', 'BooksController@handleCreate');
Route::post('/book/edit', 'BooksController@handleEdit');
Route::post('/book/delete', 'BooksController@handleDelete');
// Ajax Validation
Route::post('/book/validate', 'BooksController@bookValidate');