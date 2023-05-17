<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// -------------sport------------------
Route::get('/sports',[SportController::class,'index']);
Route::post('/sport',[SportController::class,'store']);
Route::get('/sports/{id}',[SportController::class,'show']);
Route::put('/sports/{id}',[SportController::class,'update']);
Route::delete('/sports/{id}',[SportController::class,'destroy']);

// -------------stadium------------------
Route::get('/stadia',[StadiumController::class,'index']);
Route::post('/stadium',[StadiumController::class,'store']);
Route::get('/stadia/{id}',[StadiumController::class,'show']);
Route::put('/stadia/{id}',[StadiumController::class,'update']);
Route::delete('/stadia/{id}',[StadiumController::class,'destroy']);

// -------------event------------------
Route::get('/events',[EventController::class,'index']);
Route::post('/event',[EventController::class,'store']);
Route::get('/events/{id}',[EventController::class,'show']);
Route::put('/events/{id}',[EventController::class,'update']);
Route::delete('/events/{id}',[EventController::class,'destroy']);
// Route::resource('events',EventController::class);
// -------------competition------------------
Route::get('/competitions',[CompetitionController::class,'index']);
Route::post('/competition',[CompetitionController::class,'store']);
Route::get('/competitions/{id}',[CompetitionController::class,'show']);
Route::put('/competitions/{id}',[CompetitionController::class,'update']);
Route::delete('/competitions/{id}',[CompetitionController::class,'destroy']);



// ----------------get all competition by id-----------------
Route::get('/getAllCompetitionById/{id}',[CompetitionController::class,'getAllCompetitionById']);
// -------------list down all events -----------------
Route::get('/getAllEvents',[EventController::class,'getAllEvents']);
Route::get('/searchEvent/{name_sport}/',[EventController::class,'searchEvent']);
Route::get('/detailEvent/{id}/',[EventController::class,'detailEvent']);

// ---------------booking ticket -----------------
Route::resource('buyticket', TicketController::class);