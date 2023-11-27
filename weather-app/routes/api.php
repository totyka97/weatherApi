<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\weatheApiController;


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


Route::get('/weather', [weatheApiController::class,'getList']);
Route::get('/weather/{record}', [weatheApiController::class,'getRecord']);
Route::get('/weather/location/{irsz}', [weatheApiController::class,'getIrsz']);
Route::post('/weather', [weatheApiController::class,'insertRecord']);
Route::delete('/weather/{record}', [weatheApiController::class,'deleteRecord']);
Route::put('/weather/{record}', [weatheApiController::class,'updateWeatherRecord']);
Route::put('/weather/location/{irsz}', [weatheApiController::class,'updateIrszRecord']);

