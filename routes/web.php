<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'home.index');

Route::post('/user',[UserController::class,'setUser'])->name('set.user');

Route::group(['middleware' => ['approved.user']], function(){
    Route::get('/test',[HomeController::class,'test'])->name('test');
    Route::get('/result',[ResultController::class,'index'])->name('results');
    Route::get('/question',[HomeController::class,'getNextQuestion'])->name('next.question');
    Route::post('/answer',[HomeController::class,'checkAns'])->name('submit.answer');
    Route::post('/skip',[HomeController::class,'skipQuestion'])->name('skip.question');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');

});