<?php

namespace App\Http\Controllers;

use App\Constant\ReturnStatus;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Notifications\Core\MessageNotification;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {

    }

    public function settings(){
    	return view("account.settings");
	}

	public function updateSettings($key,ProfileUpdateRequest $request){
    	$user = User::find($key);
    	if($request->hasFile("photo_url")){
    		$user->photo_url = $request->file("photo_url")->store("avatars");
		}
    	if($request->has("password")){
    		$user->password = $request->input("password");
		}
    	$user->save();
    	return back()->with(ReturnStatus::SUCCESS,__("The action was executed successfully."));
	}

	public function notifications(){
    	$auth = User::find(webAuth()->id());
    	$notifications = $auth->unreadNotifications;
    	return view("account.notifications",[
    		"notifications"=>$notifications
		]);
	}

	public function notificationsRead(Request $request){
		$auth = User::find(webAuth()->id());
    	$notifId = $request->input("notification_id");

    	if($notifId =="-" or $notifId== "all" ){
    		$auth->notifications->markAsRead();
		}else{
			DatabaseNotification::find($notifId)->markAsRead();
		}
		return back()->with(ReturnStatus::SUCCESS,__("The action was executed successfully."));

	}
}
