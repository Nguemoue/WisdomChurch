<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivreController extends Controller
{

    //
    function index(){
        return view("livres");
    }
}
