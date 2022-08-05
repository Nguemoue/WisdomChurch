<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\LiveNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    function index(){
        return view("admin.home");
    }
    function changePassword(Request $request){
        $request->validate([
            "password"=>["required","string"],
            "cpassword"=>["required","string"]
        ]);
        $password = $request->input("password");
        $cpassword = $request->input("cpassword");
        if($password!=$cpassword){
        	return  redirect()->back()->with("messages.error","Les mots de passe ne correspondent pas");
		}
        $user = User::findOrfail(auth()->user()->id);
        $user->password = bcrypt($password);
        $user->save();
        return redirect()->back()->with("messages.info","Mot de passe defini avec success");
    }

    function changeProfile(Request $request){
        $request->validate([
            'photo_url'=>"required|image"
        ]);
        $user = User::findOrfail(auth()->user()->id);
        Storage::delete($user->photo_url);
        $user->photo_url = $request->file("photo_url")->store("avatar");
        $user->save();
        auth()->user()->photo_url = $user->photo_url;
        return redirect()->back()->with("messages.info","Profile mis a jour avec success");

    }

    function live(Request $request){
        return view("admin.live");

    }

    function diffuse(){

	}
}
