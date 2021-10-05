<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('getStates',[StateController::class,'getStates'])->name('getStates');
Route::post('getCIties',[CityController::class,'getCities'])->name('getCities');
