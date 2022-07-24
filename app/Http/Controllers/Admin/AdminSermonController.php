<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SermonRequest;
use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminSermonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sermons = Sermon::all();

        return view("admin.sermons.index",compact("sermons"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.sermons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SermonRequest $request)
    {   
        //
        $sermon = new Sermon();
        $sermon->titre = $request->titre;
        $sermon->description = $request->description;
        $sermon->author = $request->author;

        // je sauvegarde mes resources
        $sermon->video_url = $request->file("video_url")->store("sermons");
        $sermon->poster_url = $request->file("poster_url")->store("poster");
        $sermon->user_id = $request->user()->id;
        
        $sermon->save();
        return redirect()->route("admin.sermons.index")->with("messages.success","Sermons Cree avec success");
        
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
        $sermon  = Sermon::findOrfail($id);
        return view("admin.sermons.edit",compact("sermon"));
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
        //
        $sermon = Sermon::find($id);
        $request->validate([
            "author"=>""
        ]);
        if($request->author)
            $sermon->author = $request->author;

        if($request->titre)
            $sermon->titre = $request->titre;
        
        if($request->description)
            $sermon->description = $request->description;

        $sermon->updated_at = now();

        if($request->file("poster_url")){
            // je supprime le fichier
            Storage::delete($sermon->poster_url);
            $sermon->poster_url = $request->file("poster_url")->store("poster");
        }
        if($request->file("video_url")){
            Storage::delete($sermon->video_url);
            $sermon->video_url = $request->file("poster_url")->store("sermons");

        }

        Session::put("me","de");
        $sermon->save();

        return response()->redirectToRoute("admin.sermons.index")->with("messages.info","votre resource a ete modifie avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sermon = Sermon::find($id);
        Storage::delete($sermon->poster_url);
        Storage::delete($sermon->video_url);

        $sermon->delete();
        return redirect()->route("admin.sermons.index")->with("messages.info","Sermon Supprimer avec success");

    }
}
