<?php


namespace App\Action;


use App\Http\Requests\SermonUpdateRequest;
use App\Models\Sermon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SermonUpdateAction
{
	public function handle(SermonUpdateRequest $request, Sermon  $sermon){
		$data = [
			"titre"=>$request->input("titre"),
			"description"=>$request->input("description"),
			"is_local"=>$request->input("type")!="link",
			"updated_at"=>now(),
			"poster_url"=>$request->hasFile("poster_url")?
				$request->file("poster_url")->store("poster"):$sermon->poster_url,
			"video_url"=>$request->input("type")=="link"?$request->input("video_link"):$request->input("video_url"),
			"user_id"=>$request->user()->id
		];
		if ($request->hasFile("poster_url")) {
			Storage::delete($sermon->poster_url);
		}
		if ($request->hasFile("video_url")) {
			Storage::delete($sermon->video_url);
		}
		$sermon->update($data);
	}
}
