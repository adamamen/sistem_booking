<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Antriancontroller extends Controller
{
    function index()
    {
        return view('antrian.index');
    }
}
