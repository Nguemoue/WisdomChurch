<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileNotFoundException;

class LivreController extends Controller
{
    function __construct()
    {
        $this->middleware("auth")->only(["download"]);
    }
    //
    function index(){
        $livres = Livre::all(); 
        return view("livres",compact('livres'));
    }
    function download(Request $request){
        try {
            $pdf = Livre::findorFail($request->id);
            try{
               $fileExits = Storage::exists($pdf->resource_url);
               if($fileExits){                
                 return Storage::response($pdf->resource_url,env("APP_NAME")."-".auth()->user()->name."-".uniqid().".pdf");
               }
            }catch(FileNotFoundException $fne){
                abort(404,$fne);
            }
            return response()->download(asset('storage/'.$pdf->resource_url));
        } catch (ModelNotFoundException $nt) {
            return redirect()->route("livres.index")->with("messages.warning","attation pdf non trouve");
        }
    }
}
