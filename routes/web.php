<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryStateCityController;

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

Route::get('country-state-city',[CountryStateCityController::class,'index']);
Route::post('get-states-by-country',[CountryStateCityController::class,'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class,'getCity']);
