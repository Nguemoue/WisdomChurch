<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SermonController extends Controller
{
    //
    function index(){
        return view("sermons");
    }

}
