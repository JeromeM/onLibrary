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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function handleCreate(Request $request)
    {

        $book = new Books;
        $book->title = $request->input('title');
        $book->author_id = $request->input('author');
        $book->save();

        return Redirect::action('BooksController@index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Books $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function handleEdit(Request $request)
    {
        $book = Books::findOrFail($request->input('id'));
        $book->title = $request->input('title');
        $book->author_id = $request->input('author');
        $book->save();

        return Redirect::action('BooksController@index');
    }


    /**
     * @param Books $book
     * @return mixed
     */
    public function delete(Books $book)
    {
        return view('books.delete', compact('book'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
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
            'title.required'    => 'Title can\'t be empty',
            'title.string'      => 'Title must be a string',
            'title.min'         => 'Title must be a least 3 characters long',

            // On ne devrait jamais voir cette erreur, car la liste vient *deja* de la base de données
            'author.exists'     => 'Author unknown. You must add it before',
        );

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
        }


        return response()->json(['success' => $success, 'errors' => $errors]);

    }

}
