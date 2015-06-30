<?php

namespace onLibrary\Http\Controllers;

use Illuminate\Http\Request;

use onLibrary\Http\Requests;
use onLibrary\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Homepage
     */
    public function index()
    {
        return view('index');
    }


    /**
     * Plans listing
     */
    public function plans()
    {

    }


    /**
     * Contact page
     */
    public function contact()
    {
        //
    }

}
