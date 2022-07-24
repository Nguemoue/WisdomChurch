<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    //
    function index(){
        $events = Event::orderBy("created_at","desc")->paginate();
        return view("events",compact("events"));
    }
}
