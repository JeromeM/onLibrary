<?php

namespace onLibrary\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use onLibrary\Http\Requests;
use onLibrary\Models\Books;
use Validator;

class BooksController extends Controller
{

    /**
     * Books list
     */
    public function index()
    {
        //
    }


    /**
     * Add a book
     */
    public function add()
    {
        //
    }

    /**
     * Add a book form submission
     */
    public function addHandler()
    {
        //
    }

    /**
     * Add a book form validation
     */
    public function addValidation()
    {
        //
    }


    /**
     * Modify a book
     */
    public function modify()
    {
        //
    }

    /**
     * Modify a book form submission
     */
    public function modifyHandler()
    {
        //
    }

    /**
     * Modify a book form validation
     */
    public function modifyValidation()
    {
        //
    }


    /**
     * Delete a book
     */
    public function del()
    {
        //
    }

    /**
     * Delete a book form submission
     */
    public function delHandler()
    {
        //
    }


    /****************** OLD
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }


    public function create()
    {
        return view('books.create');
    }


    public function handleCreate(Request $request)
    {

        $book = new Books;
        $book->title = $request->input('title');
        $book->author_id = $request->input('author');
        $book->save();

        return Redirect::action('BooksController@index');

    }

    public function edit(Books $book)
    {
        return view('books.edit', compact('book'));
    }


    public function handleEdit(Request $request)
    {
        $book = Books::findOrFail($request->input('id'));
        $book->title = $request->input('title');
        $book->author_id = $request->input('author');
        $book->save();

        return Redirect::action('BooksController@index');
    }



    public function delete(Books $book)
    {
        return view('books.delete', compact('book'));
    }


    public function handleDelete(Request $request)
    {
        $book = Books::findOrFail($request->input('id'));
        $book->delete();

        return Redirect::action('BooksController@index');
    }


    public function bookValidate(Request $request)
    {
        $success    = true;
        $errors     = array();

        // Validation des données
        $input = array(
            'title'     => $request->input('title'),
            'author'    => $request->input('author'),
        );

        $rules = array (
            'title'     => 'required|string|min:3',
            'author'    => 'required|integer|exists:authors,id',
        );

        $messages = array(
            'title.required'    => trans('validation.titleRequired'),
            'title.string'      => trans('validation.titleString'),
            'title.min'         => trans('validation.titleMin'),

            // On ne devrait jamais voir cette erreur, car la liste vient *deja* de la base de données
            'author.exists'     => trans('validation.authorExists'),
        );

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
        }


        return response()->json(['success' => $success, 'errors' => $errors]);

    }
    ********************/

}
