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

Route::resource('dijelatnik', 'DijelatnikController');
Route::resource('fakultet',   'FakultetController');
Route::resource('komentari',  'KomentariController');
Route::resource('korsinik',   'KorsinikController');
Route::resource('odijel_djelatnik', 'Odijel_djelatnikController');
Route::resource('odjel', 'OdjelController');
Route::resource('ponudene_teme', 'PonudeneTemeController');
Route::resource('radovi', 'RadoviController');
Route::resource('statusi_rada', 'StatusiRadaController');
Route::resource('student', 'StudentController');
Route::resource('verzije_radova', 'VerzijeRadovaController');