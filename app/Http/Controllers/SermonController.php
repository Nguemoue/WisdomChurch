<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    //
    function index(){
        $sermons = Sermon::paginate(2);
        // dd($sermons);
        return view("sermons",compact("sermons"));
    }

    function show($id){
        dd($id);  
    }
}
