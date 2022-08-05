<?php

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get("/event-date",function(){
        $date = Event::query()->orderBy("start_at","asc")->where("start_at",">",now()->subDay())->pluck("start_at")->first();
        $diff = now()->diff($date);
		$data["date"] = $date;
		$data["data"] = $date->Format("M d, Y h:i:s");
        $data["msg"] = "ok";
        return response()->json($data);

    });

