<?php

namespace App\Http\Controllers;

use App\Constant\ReturnStatus;
use App\Http\Requests\Testimony\StoreRequest;
use App\Http\Requests\Testimony\UpdateRequest;
use App\Models\Testimony;
use App\Services\TestimonyService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TestimonyController extends Controller
{

	public function __construct(public TestimonyService $testimonyService)
	{

	}

	/**
	 * @throws \Throwable
	 */
	public function index(string $encodedUser = null)
	{
		$userId = null;
		if($encodedUser!=null){
			$decodedKey = base64_decode($encodedUser);
			$userId = intval($decodedKey);
			if($userId == 0){
				return redirect()->route("dashboard")->withErrors([__('auth.failed')]);
			}
		}
		$testimonies = Testimony::query()
			->when($encodedUser,function($query) use ($userId){
			$query->where("user_id",$userId);
		})->get();
		return $encodedUser==null?
			view("testimonies_list",["testimonies"=>$testimonies]):
			view("user_testimonies",["testimonies"=>$testimonies]);

	}

	public function store(StoreRequest $request){
		$userId = base64_decode($request->input("user_id"));
		if(intval($userId) == 0){
			throw  ValidationException::withMessages([__('auth.failed')]);
		}
		$this->testimonyService->store($userId,$request->input("content"));
		return back()->with(ReturnStatus::SUCCESS,__('response.create.success'));
	}

	public function destroy($key){
		try {
			$this->testimonyService->destroy("id",$key);
		}catch (\Exception $exception){
			return back()->withErrors(__("validation.exists", ["attribute" => "testimony"]));
		}
		return redirect()->back()->with(ReturnStatus::SUCCESS,__("The :resource was deleted!",['resource'=>__("Testimony")]));

	}

	public function update($key,UpdateRequest $request){
		try {
			$this->testimonyService->update("id",$key,$request->only("content"));
		}catch (\Exception $exception){
			return back()->withErrors(__("validation.exists", ["attribute" => "testimony"]));
		}
		return redirect()->back()->with(ReturnStatus::SUCCESS,__("The action ran successfully!"));
	}
}
