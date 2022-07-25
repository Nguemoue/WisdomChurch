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

    function show($id){
        $event = Event::findOrFail($id);
        return view("events_show",compact("event"));
    }

    function lastevent(){
        $event = Event::query()->orderBy("start_at","asc")->first();
        return redirect()->route("events.show",['event'=>$event->id]);
    }
}
