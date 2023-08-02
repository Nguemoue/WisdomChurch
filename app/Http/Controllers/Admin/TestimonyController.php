<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
	public function index(int $userId = null)
	{
		$testimonies = Testimony::query()->get();
		return view("admin.testimonies.index",[
			"testimonies"=>$testimonies
		]);
	}

	public function create()
	{
	}

	public function store(Request $request)
	{
	}

	public function show(Testimony $testimony)
	{
	}

	public function edit(Testimony $testimony)
	{
	}

	public function update(Request $request, Testimony $testimony)
	{
	}

	public function destroy(Testimony $testimony)
	{
	}
}
