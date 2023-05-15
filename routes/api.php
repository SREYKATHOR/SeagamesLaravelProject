<?php

use App\Http\Controllers\SportController;
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
Route::get('sports',[SportController::class,'index']);
Route::post('sport',[SportController::class,'store']);
Route::get('sports/{id}',[SportController::class,'show']);
Route::put('sports/{id}',[SportController::class,'update']);
Route::delete('sports/{id}',[SportController::class,'destroy']);