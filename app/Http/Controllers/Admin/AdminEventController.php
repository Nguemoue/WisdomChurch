<?php

namespace App\Http\Controllers\Admin;

use App\Events\DeleteEventEvent;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SermonRequest;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::all();
        return view("admin.events.index",compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        //
        $event = new Event();
        $event->titre = $request->titre;
        $event->description = $request->description;
        $event->lieu = $request->lieu;
        $event->poster_url = $request->file("poster_url")->store("events");
        $event->start_at = $request->start_at;
        $event->user_id = $request->user()->id;

        $event->save();
        return redirect()->route("admin.events.index")->with("messages.info","Evenement cree avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
                $event = Event::findOrFail($id);
        $e =  view("admin.events.edit",compact("event"))->render();
        return $e;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->lieu = $request->lieu;
        $event->titre = $request->titre;
        $event->description = $request->description;
        if($request->cropdata){
            $image_parts = explode(";base64,",$request->cropdata);
            $img_aux = explode("image/",$image_parts[0]);
            $ext = $img_aux[1];
            $data = $image_parts[1];
            $data = base64_decode($data);
            $name = "poster/".uniqid().".".$ext;
            $res = Storage::disk("public")->put($name,$data);
            $delRes = Storage::delete($event->poster_url);
            $event->poster_url = $name;
            
        }
        
        $event->save();
        return redirect()->route("admin.events.index")->with("messages.info","L'evenement precedent a ete modifier avec success" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::findOrFail($id);
        $event->delete();
        event(new DeleteEventEvent($event));
        Storage::delete($event->poster_url);
        return redirect()->back()->with("messages.info","Evenement Supprimer avec success");
    }
}
