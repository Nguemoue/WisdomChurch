<?php

namespace App\Http\Controllers;

use App\Events\DeleteEventEvent;
use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    //
    function __construct(Request $request)
    {   
        // je supprime tous les evenement qui sont deja passe
        $passEvent = Event::query()->where("start_at","<",now())->get();
        event(new DeleteEventEvent($passEvent));
        // dd($passEvent);
    }
    function index(){
        $events = Event::orderBy("created_at","desc")->paginate(4);
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
