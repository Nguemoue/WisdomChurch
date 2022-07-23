<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //ssss

    // methodes qui gere la page d'acceuil (la route / )
    function index(){
        // traitements
        return view("index");
    }

    // Route contacts
    function contact(){
        return view("contact");
    }

    // Route about
    function about(){
        return view("about");
    }
}
