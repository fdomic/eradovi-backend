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

//Token
Route::post('login', 'APILoginController@login');

Route::group([ 'middleware' => ['jwt.auth'] ], function() {

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
    Route::resource('status-verzije',   'StatusVerzijaController');
    
    //Ucitavanje datoteke:
    Route::post    ('ucitaj/{id}',      'VerzijaRadaController@postImage');
    
    //Rezervacija rada:
    Route::resource('rezervacija',      'RezervacijaRadaController');
    
    //Kronologija rada
    Route::get('kronologija/{id}',   'KronologijaController@show');
    
    //Odlucivanje u vezi rezervacije rada:
    Route::post ('odlucivanje/{id}',   'RezervacijaRadaOdlucivanjeController@store');

    //Komentari
    Route::post ('komentar/{id}',         'KomentarController@store');
});


