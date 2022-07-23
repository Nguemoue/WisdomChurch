<?php

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

// Livres
Route::get("/livres",[LivreController::class,"index"])->name("livres.index");



// Auth
require __DIR__.'/auth.php';
