<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivreRequest;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $livres = Livre::all();
        return view ("admin.livres.index",compact("livres"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.livres.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivreRequest $request)
    {
        //
        $livre = new Livre();
        $livre->titre = $request->titre;
        $livre->description = $request->description;
        $livre->poster_url = $request->file("poster_url")->store("poster");
        $livre->resource_url = $request->file("resource_url")->store("pdf");

        $livre->save();
        return redirect()->route("admin.livres.index")->with("messages.success","livre ajoute avec success");
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
        $livre = Livre::findOrFail($id);
        return view("admin.livres.edit",compact('livre'));
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
        $livre = Livre::findOrFail($id);

        if($request->file("poster_url")){
            Storage::delete($livre->poster_url);
            $livre->poster_url = $request->file("poster_url")->store("poster");

        }
        if($request->file("resource_url")){
            Storage::delete($livre->resource_url);
            $livre->resource_url = $request->file("resource_url")->store("pdf");
        }

        $livre->titre = $request->titre;
        $livre->updated_at = now();
        $livre->description = $request->description;
        $livre->save();
        return redirect()->route("admin.livres.index")->with("messages.info","Livre edite avec success");
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
        $livre = Livre::findORFail($id);
        Storage::delete($livre->poster_url);
        Storage::delete($livre->resource_url);

        $livre->delete();
        return redirect()->route("admin.livres.index")->with("messages.info","livres supprime avec success");
    }
}
