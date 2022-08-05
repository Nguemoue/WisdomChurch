<?php

namespace App\Http\Controllers;

use App\Events\LiveMessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    function __invoke(Request $request)
    {
		LiveMessageEvent::broadcast($request->input("titre"),$request->input("lien"),auth()->user()->name)->toOthers();
		return  response()->json([
			"msg"=>"chat successfully diffuse"
		]);
    }

}
