<?php


/**
 * Homepage and related
 */
Route::get('/',         'IndexController@index');
Route::get('/plans',    'IndexController@plans');
Route::get('/contact',  'IndexController@contact');


/**
 * Login / Create account / Logout
 */
Route::group([
    'namespace' => 'Auth'
], function() {
    // Login / Logout
    Route::get('auth/login',        'AuthController@getLogin');
    Route::post('auth/login',       'AuthController@postLogin');
    Route::get('auth/logout',       'AuthController@getLogout');
    // Register
    Route::get('auth/register',     'AuthController@getRegister');
    Route::post('auth/register',    'AuthController@postRegister');
});


/**
 * Data models
 */
Route::model('user',    'onLibrary\Models\Users');
Route::model('book',    'onLIbrary\Models\Books');
Route::model('author',  'onLibrary\Models\Authors');


/**
 * Library group
 */
Route::group([
    'middleware' => 'auth',
    'namespace'  => 'Users',
], function() {
    // Navigation
    Route::get('/account',                          'AccountController@index');

    Route::get('/account/infos',                    'AccountController@show');
    Route::get('/account/modify',                   'AccountController@modify');
    Route::get('/account/plan',                     'AccountController@buyPlan');

    Route::get('/account/addBook',                  'AccountController@addBook');
    Route::get('/account/delBook',                  'AccountController@delBook');

    // Forms Submission
    Route::post('/account/modify',                  'AccountController@modifyHandler');
    Route::post('/account/plan',                    'AccountController@buyPlanHandler');
    Route::post('/account/addBook',                 'AccountController@addBookHandler');
    Route::post('/account/delPlan',                 'AccountController@delBookHandler');


    // Ajax Validation
    Route::post('/account/modify/validation',       'AccountController@modifyValidation');
    Route::post('/account/addbook/validation',      'AccountController@addBookValidation');
});


/**
 * Admin group
 */
Route::group([
    'middleware' => 'admin',
    'namespace'  => 'Admin',
], function() {
    // Base navigation
    Route::get('/admin',                            'AdminController@index');

    // User navigation
    Route::get('/admin/users',                      'UserController@index');
    Route::get('/admin/user/add',                   'UserController@add');
    Route::get('/admin/user/modify',                'UserController@modify');
    Route::get('/admin/user/del',                   'UserController@del');
    Route::get('/admin/user/addPlan',               'UserController@addPlan');
    // User forms submissions
    Route::post('/admin/user/add',                  'UserController@addHandler');
    Route::post('/admin/user/modify',               'UserController@modifyHandler');
    Route::post('/admin/user/del',                  'UserController@delHandler');
    Route::post('/admin/user/addPlan',              'UserController@addPlanHandler');
    // User Ajax validation
    Route::post('/admin/user/add/validation',       'UserController@addValidation');
    Route::post('/admin/user/modify/validation',    'UserController@modifyValidation');


    // Authors navigation
    Route::get('/admin/authors',                    'AuthorsController@index');
    Route::get('/admin/author/add',                 'AuthorsController@add');
    Route::get('/admin/author/modify',              'AuthorsController@modify');
    Route::get('/admin/author/del',                 'AuthorsController@del');
    // Authors forms submissions
    Route::post('/admin/author/add',                'AuthorsController@addHandler');
    Route::post('/admin/author/modify',             'AuthorsController@modifyHandler');
    Route::post('/admin/author/del',                'AuthorsController@delHandler');
    // Authors Ajax validation
    Route::post('/admin/author/add/validation',     'AuthorsController@addValidation');
    Route::post('/admin/author/modify/validation',  'AuthorsController@modifyValidation');


    // Books navigation
    Route::get('/admin/books',                      'BooksController@index');
    Route::get('/admin/book/add',                   'BooksController@add');
    Route::get('/admin/book/modify',                'BooksController@modify');
    Route::get('/admin/book/del',                   'BooksController@del');
    // Books forms submissions
    Route::post('/admin/book/add',                  'BooksController@addHandler');
    Route::post('/admin/book/modify',               'BooksController@modifyHandler');
    Route::post('/admin/book/del',                  'BooksController@delHandler');
    // Books Ajax validation
    Route::post('/admin/book/add/validation',       'BooksController@addValidation');
    Route::post('/admin/book/modify/validation',    'BooksController@modifyValidation');

});