<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\Sermon;
use App\Models\Testimony;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // methodes qui gere la page d'acceuil (la route / )
    function index(){
        // traitements
        $sermons = Sermon::orderBy("created_at","desc")->get()->take(3);
        $events = Event::orderBy("created_at","desc")->get()->take(3);
        $testimonies=Testimony::take(4)->get();
        $lastEvent = Event::query()->latest("start_at")->first();
        $lastEventDate = $lastEvent?->start_at??now();
        $lastEventDate = $lastEventDate->format("M d, Y h:i:s");
        $properties = Property::query()
			->leftJoin(PropertyValue::getModel()->getTable(),function($join){
				$join->on("property_values.property_id","properties.id");
			})->select('value',"properties.name")->get()->keyBy("name");

        return view("index",compact("sermons","events","lastEvent","lastEventDate","testimonies","properties"));
    }

    // Route contacts
    function contact(){
        return view("contact");
    }

    // Route about
    function about(){
        return view("about");
    }
}
