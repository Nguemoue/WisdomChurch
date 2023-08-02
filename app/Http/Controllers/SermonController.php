<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    //
    function __construct()
    {

    }
    function index(){
        $sermons = Sermon::paginate(6);
        // dd($sermons);
        return view("sermons",compact("sermons"));
    }

    function show($id){
        $sermon = Sermon::findOrFail($id);
        $other = Sermon::query()->get()->sortByDesc(function($elt)use ($id){return $elt->id==$id;});
        return view("sermons_show",compact("sermon","other"));
    }
}
