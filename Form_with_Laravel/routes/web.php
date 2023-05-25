<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('index');
});

Route::resource('user', user_reg::class);

Route::post('index', [App\Http\Controllers\user_reg_Controller::class,'store'])->name('store');
Route::get('/actors/bio', [ActorController::class,'getActorsBornOnDate']);
