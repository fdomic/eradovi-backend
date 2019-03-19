<?php

use Illuminate\Http\Request;

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

Route::resource('fakultet', 'FakultetController');
Route::resource('odjel', 'OdjelController');
Route::resource('odijel_djelatnik', 'Odijel_djelatnikController');
Route::resource('dijelatnik', 'DijelatnikController');
Route::resource('korsinik', 'korsinikController');
Route::resource('student', 'StudentController');
