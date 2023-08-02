<?php


namespace App\Action;


use App\Models\Sermon;
use Illuminate\Database\Eloquent\Model;

class SermonStoreAction
{
	public function handle($request){
		$sermon = new Sermon();
		$sermon->titre = $request->input("titre");
		$sermon->description = $request->input("description");
		$sermon->author = $request->input("author");
		$sermon->is_local = $request->input("type") != "link";
		if ($request->input("type") == "link"){
			$sermon->video_url = $request->input("video_link");
		}else{
			$sermon->video_url = $request->file("video_url")->store("sermons");
		}
		$sermon->poster_url = $request->file("poster_url")->store("poster");
		$sermon->user_id = $request->user()->id;
		$sermon->save();
	}

}
