<?php

use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminLivreController;
use App\Http\Controllers\Admin\AdminSermonController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\TestimonyController as UserTestimony;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\SermonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
	"prefix" => LaravelLocalization::setLocale(),
	'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
// Home
	Route::get('/', [HomeController::class, "index"])->name("home");

	Route::get("/about", [HomeController::class, "about"])->name("about");

	Route::get("/contact", [HomeController::class, "contact"])->name("contact");

// Events
	Route::get("/events", [EventController::class, "index"])->name("events.index");
	Route::get("/events/last", [EventController::class, "lastevent"])->name("events.last");
	Route::get("events/{event}", [EventController::class, "show"])->name("events.show")->whereNumber("event");

// Sermons
	Route::get("/sermons", [SermonController::class, "index"])->name("sermons.index");
	Route::get("/sermons/{sermon}", [SermonController::class, "show"])->name("sermons.show");

// Livres
	Route::get("/Books", [LivreController::class, "index"])->name("livres.index");
	Route::get("/book/download", [LivreController::class, "download"])->name("book.download");

	//temoignages
	Route::get("testimonies/{userId?}",[UserTestiMony::class,"index"])->name("testimony.index");
	Route::post("testimonies/store",[UserTestiMony::class,"store"])->name("testimony.store");
	Route::post("testimonies/{key}/update",[UserTestiMony::class,"update"])->name("testimony.update");
	Route::post("testimonies/{key]/destroy",[UserTestiMony::class,"destroy"])->name("testimony.destroy");
	//dashboard

	Route::get("dashboard",\App\Http\Controllers\DashboardController::class)->name("dashboard");
	Route::group(["as"=>"dashboard.","prefix" => "dashboard"],function (){
		Route::get("account/settings",[\App\Http\Controllers\ProfileController::class,"settings"])->name("account.settings");
		Route::post("account/{key}/settings/update",[\App\Http\Controllers\ProfileController::class,"updateSettings"])->name("account.settings.update");
		Route::get("account/notifications",[\App\Http\Controllers\ProfileController::class,"notifications"])->name("account.notifications");
		Route::post("account/notifications/read",[\App\Http\Controllers\ProfileController::class,"notificationsRead"])->name("account.notifications.read");
		Route::get("account/connections",[\App\Http\Controllers\ProfileController::class,"connection"])->name("account.connections");
	});
	// Administrateur
	Route::get("kt-admin", [AdminController::class, "index"])->name("admin.index")->middleware("auth.admin");

	Route::group(["as" => "admin.", "prefix" => "kt-admin", "middleware" => "auth.admin"], function () {

		Route::resource("events", AdminEventController::class);
		Route::resource("livres", AdminLivreController::class);
		Route::resource("sermons", AdminSermonController::class);
		Route::resource("users", AdminUserController::class);
		Route::resource("properties", PropertyController::class);
		Route::resource("testimonies", TestimonyController::class);
		Route::post("profil/update", [AdminController::class, "changeProfile"])->name("profile.update");

		Route::post("password/update", [AdminController::class, "changePassword"])->name("password.update");

		Route::get("live", [AdminController::class, "live"])->name("live.done");
		Route::post("live/diffuse", [AdminController::class, "diffuse"])->name("live.diffuse");
	});

});


// Auth
require __DIR__ . '/auth.php';

