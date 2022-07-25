<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
class LivreController extends Controller
{

    //
    function index(){
        $livres = Livre::all(); 
        return view("livres",compact('livres'));
    }
}
