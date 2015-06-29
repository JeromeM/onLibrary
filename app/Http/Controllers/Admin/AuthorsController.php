<?php
namespace onLibrary\Http\Controllers\Admin;

use Illuminate\Http\Request;

use onLibrary\Http\Requests;
use onLibrary\Http\Controllers\Controller;

class AuthorsController extends Controller
{

    /**
     * AUthors list
     */
    public function index()
    {
        //
    }


    /**
     * Add an author
     */
    public function add()
    {
        //
    }

    /**
     * Add an author form submission
     */
    public function addHandler()
    {
        //
    }

    /**
     * Add an author form validation
     */
    public function addValidation()
    {
        //
    }


    /**
     * Modify an author
     */
    public function modify()
    {
        //
    }

    /**
     * Modify an author form submission
     */
    public function modifyHandler()
    {
        //
    }

    /**
     * Modify an author form validation
     */
    public function modifyValidation()
    {

    }


    /**
     * Delete an author
     */
    public function del()
    {
        //
    }

    /**
     * Delete an author form submission
     */
    public function delHandler()
    {
        //
    }



    /********************** OLD
    public function index()
    {
        $authors = Authors::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function handleCreate(Request $request)
    {
        $author = new Authors;
        $author->firstname = $request->input('firstname');
        $author->lastname = $request->input('lastname');
        $author->save();

        return Redirect::action('AuthorsController@index');
    }

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
    **********/

}
