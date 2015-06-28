<?php

namespace onLibrary\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use onLibrary\Http\Requests;
use onLibrary\Models\Authors;
use Validator;

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
        $author = Authors::findOrFail($request->input('id'));
        $author->delete();

        return Redirect::action('AuthorsController@index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authorValidate(Request $request)
    {
        $success    = true;
        $errors     = array();

        // Validation des données
        $input = array(
            'firstname'     => $request->input('firstname'),
            'lastname'      => $request->input('lastname'),
        );

        $rules = array (
            'firstname'     => 'required|string|min:3',
            'lastname'      => 'required|string|min:3',
        );

        $messages = array(
            'firstname.required'    => trans('validation.firstnameRequired'),
            'firstname.string'      => trans('validation.firstnameString'),
            'firstname.min'         => trans('validation.firstnameMin'),

            'lastname.required'    => trans('validation.lastnameRequired'),
            'lastname.string'      => trans('validation.lastnameString'),
            'lastname.min'         => trans('validation.lastnameeMin'),
        );

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
        }


        return response()->json(['success' => $success, 'errors' => $errors]);

    }

}
