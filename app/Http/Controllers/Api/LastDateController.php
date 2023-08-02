<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;

class LastDateController extends Controller
{
	public function __invoke()
	{
		$date = Event::query()
			->orderBy("start_at", "asc")
			->where("start_at", ">", now()->subDay())
			->pluck("start_at")->first();
		$data = [];
		if ($date) {
			$diff = now()->diff($date);
			$data["date"] = $date;
			$data["data"] = $date->format("M d, Y h:i:s");
			$data["msg"] = "ok";
		}
		return response()->json($data);
	}
}
