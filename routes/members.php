<?php

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
use App\Http\Controllers\Members\{
    RegisterController,
    AuthController,
    LuckyController};


Route::get('register',[RegisterController::class,'index'])->name('members.registerindex');;
Route::post('register',[RegisterController::class,'register'])->name('members.register');

Route::get('login',[AuthController::class,'index'])->name('members.loginindex');;
Route::post('login',[AuthController::class,'authenticate'])->name('members.login');

Route::get('lucky',[LuckyController::class,'index']);
Route::get('{link:url}',[LuckyController::class,'link'])->name('lucky.link');
