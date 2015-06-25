<?php

namespace onLibrary\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use onLibrary\Http\Requests;
use onLibrary\Models\Authors;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $authors = Authors::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function handleCreate(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
        ], [
            'firstname.required' => 'Firstname is empty',
            'firstname.min' => 'Firstname must have at least 3 characters',
            'lastname.required' => 'Lastname is empty',
            'lastname.min' => 'Lastname must have at least 3 characters',
        ]);
        $author = new Authors;
        $author->firstname = $request->input('firstname');
        $author->lastname = $request->input('lastname');
        $author->save();

        return Redirect::action('AuthorsController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Authors $author
     * @return Response
     */
    public function edit(Authors $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function handleEdit(Request $request)
    {
        $author = Authors::findOrFail($request->input('id'));
        $author->firstname = $request->input('firstname');
        $author->lastname = $request->input('lastname');
        $author->save();

        return Redirect::action('AuthorsController@index');
    }


    /**
     * @param Authors $author
     * @return mixed
     */
    public function delete(Authors $author)
    {
        return view('authors.delete', compact('author'));
    }

    public function handleDelete(Request $request)
    {
        $id = $request->input('author');
        $author = Authors::findOrFail($id);
        $author->delete();

        return Redirect::action('AuthorsController@index');
    }

}
