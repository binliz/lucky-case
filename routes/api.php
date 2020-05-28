<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Members\Api\LinkController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:members')->group(function (){
    Route::get('links',[LinkController::class,'index']);
    Route::post('links',[LinkController::class,'store']);
    Route::put('links/{id}',[LinkController::class,'update']);
    Route::get('links/{link}/lucky',[LinkController::class,'lucky']);
    Route::get('links/{link}/history',[LinkController::class,'luckyHistory']);

});
