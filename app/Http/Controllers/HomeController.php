<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sermon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //ssss

    // methodes qui gere la page d'acceuil (la route / )
    function index(){
        // traitements
        $sermons = Sermon::orderBy("created_at","desc")->get()->take(3);
        $events = Event::orderBy("created_at","desc")->get()->take(3);
        return view("index",compact("sermons","events"));
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
