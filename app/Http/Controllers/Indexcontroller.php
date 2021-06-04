<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
    function index_admin()
    {
        return view('index.index');
    }

    function index()
    {
        return view('front.index');
    }
}
