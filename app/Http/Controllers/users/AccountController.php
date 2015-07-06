<?php
namespace onLibrary\Http\Controllers\Users;

use Illuminate\Http\Request;

use onLibrary\Http\Requests;
use onLibrary\Http\Controllers\Controller;

class AccountController extends Controller
{

    /**
     * User library
     */
    public function index()
    {
        return view('account.index');
    }


    /**
     * Show account informations
     */
    public function show()
    {
        //
    }


    /**
     * Modify account informations
     */
    public function modify()
    {
        //
    }

    /**
     * Modify account informations form submission
     */
    public function modifyHandler()
    {
        //
    }

    /**
     * Modify account informations Ajax validation
     */
    public function modifyValidation()
    {
        //
    }


    /**
     * Buy plan page
     */
    public function buyPlan()
    {
        //
    }

    /**
     * Buy plan form submission
     */
    public function buyPlanHandler()
    {
        //
    }


    /**
     * Add a book
     */
    public function addBook()
    {
        //
    }

    /**
     * Add a book form submission
     */
    public function addBookHandler()
    {
        //
    }

    /**
     * Add a book Ajax validation
     */
    public function addBookValidation()
    {
        //
    }


    /**
     * Delete a book
     */
    public function delBook()
    {
        //
    }

    /**
     * Delete a book form submission
     */
    public function delBookHandler()
    {
        //
    }

}