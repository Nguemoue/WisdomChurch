<?php

use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminLivreController;
use App\Http\Controllers\Admin\AdminSermonController;
use App\Http\Controllers\AdminController;
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

// Home 
Route::get('/',[HomeController::class,"index"])->name("home");

Route::get("/about",[HomeController::class,"about"])->name("about");

Route::get("/contact",[HomeController::class,"contact"])->name("contact");

// Events
Route::get("/events",[EventController::class,"index"])->name("events.index");

// Sermons
Route::get("/sermons",[SermonController::class,"index"])->name("sermons.index");
Route::get("/sermons/{sermon}",[SermonController::class,"show"])->name("sermons.show");

// Livres
Route::get("/Books",[LivreController::class,"index"])->name("livres.index");

// Administrateur
Route::get("kt-admin",[AdminController::class,"index"])->name("admin.index")->middleware("auth.admin");

Route::group(["as"=>"admin.","prefix"=>"kt-admin"],function(){
    
    Route::resource("events",AdminEventController::class);
    
    Route::resource("livres",AdminLivreController::class);

    Route::resource("sermons",AdminSermonController::class);

    Route::get("users",[AdminController::class,"users"])->name("users.index");

});



// Auth
require __DIR__.'/auth.php';
