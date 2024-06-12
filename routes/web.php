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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/getweatherdata', [App\Http\Controllers\HomeController::class, 'getWeatherData']);
Route::get('/getweatherforecast/{city}', [App\Http\Controllers\HomeController::class, 'getWeatherForecast']);

Route::get('/placessearch', [App\Http\Controllers\PlaceSearchController::class, 'index']);
