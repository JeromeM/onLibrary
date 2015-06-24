<?php

namespace onLibrary\Http\Controllers;

use Illuminate\Http\Request;

use onLibrary\Http\Requests;
use onLibrary\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }

}
