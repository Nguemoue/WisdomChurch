<?php

namespace App\Http\Controllers\Admin;

use App\Action\SermonStoreAction;
use App\Action\SermonUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SermonRequest;
use App\Http\Requests\SermonUpdateRequest;
use App\Models\Sermon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminSermonController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Application|Factory|View|Response
	 */
	public function index()
	{
		//
		$sermons = Sermon::all();

		return view("admin.sermons.index", compact("sermons"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Application|Factory|View|Response
	 */
	public function create()
	{
		//
		return view("admin.sermons.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SermonRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(SermonRequest $request,SermonStoreAction $storeAction)
	{
		//traitement du resultat
		$storeAction->handle($request);
		return redirect()->route("admin.sermons.index")->with("messages.success", "Sermons Cree avec success");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Application|Factory|View|Response
	 */
	public function edit($id)
	{
		//
		$sermon = Sermon::findOrfail($id);
		return view("admin.sermons.edit", compact("sermon"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param SermonUpdateRequest $request
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Throwable
	 */
	public function update(SermonUpdateRequest $request, int $id,SermonUpdateAction $updateAction)
	{
		$sermon = Sermon::find($id);
		throw_if($sermon==null,ValidationException::withMessages(['sermon n\'as pas été trouvé']));
		$updateAction->handle($request,$sermon);
		return response()->redirectToRoute("admin.sermons.index")->with("messages.info", "votre resource a ete modifie avec success");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sermon = Sermon::find($id);
		Storage::delete($sermon->poster_url);
		Storage::delete($sermon->video_url);

		$sermon->delete();
		return redirect()->route("admin.sermons.index")->with("messages.info", "Sermon Supprimer avec success");

	}
}
