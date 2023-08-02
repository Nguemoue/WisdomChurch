<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
    	$properties = Property::all();
    	return view("admin.properties.index",[
    		"properties"=>$properties
		]);
    }

    public function create()
    {
    }

    public function store(StorePropertyRequest  $request)
    {
    	$data = $request->except("_token");

    	foreach (config('app.props_name') as $key=>$name){
    		$arr[] = Property::whereCode($key)->first()->propertyValue()->update(['value'=>$request->input($key)]);
		}
    	return back()->with("message.success","mise à jour éffectué");
    }

    public function show(Property $property)
    {
    }

    public function edit(Property $property)
    {
    }

    public function update(Request $request, Property $property)
    {
    }

    public function destroy(Property $property)
    {
    }
}
