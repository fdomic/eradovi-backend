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

Route::resource('korisnik',         'KorisnikController');
Route::resource('dijelatnik',       'DjelatnikController');
Route::resource('fakultet',         'FakultetController');
Route::resource('odjel',            'OdjelController');
Route::resource('odijel-djelatnik', 'OdjelDjelatnikaController');
Route::resource('student',          'StudentController');
Route::resource('statusi-rada',     'StatusRadaController');
Route::resource('rad',              'RadController');
Route::resource('ponudena-tema',    'PonudenaTemaController');
Route::resource('verzija-rada',     'VerzijaRadaController');
Route::resource('komentar',         'KomentarController');
Route::resource('status-verzije',   'StatusVerzijaController');

//Ucitavanje datoteke:
Route::post    ('ucitaj/{id}',           'VerzijaRadaController@postImage');

//Rezervacija rada:
Route::resource('rezervacija/{id}',   'RezervacijaRadaController');
