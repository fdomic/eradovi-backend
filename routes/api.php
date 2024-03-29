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

        Route::get('refresh', 'APILoginController@refresh');

        Route::resource('user',         'KorisnikController');
        Route::get('user/{id}',         'KorisnikController@show');

        //Fakultet
        Route::resource('fakultet',         'FakultetController');
        Route::get('fakultet/{id}',   'FakultetController@show');

        //Odjel
        Route::resource('odjel',            'OdjelController');
        Route::get('odjel/{id}',   'OdjelController@show');
        
        //Odjel djelatnika
        Route::resource('odijel-djelatnik', 'OdjelDjelatnikaController');
        Route::get('odijel-djelatnik/{id}',   'OdjelDjelatnikaController@show');

        //Student
        Route::resource('student',          'StudentController');
        Route::get('student/{id}',   'StudentController@show');

        //Djelatnik
        Route::resource('dijelatnik',       'DjelatnikController');
        Route::get('dijelatnik/{id}',   'DjelatnikController@show');


        //Ucitavanje datoteke:
        Route::post    ('ucitaj/{id}',      'VerzijaRadaController@postImage');
        Route::resource('vrati',         'VerzijaRadaController');



        //Rad
        Route::resource('rad',              'RadController');
        Route::get('rad/{id}',   'RadController@show');

        //Ponudena tema
        Route::resource('ponudena-tema',    'PonudenaTemaController');
        Route::get('ponudena-tema/{id}',   'PonudenaTemaController@show');

        //Ucitavanje datoteke:
        Route::post    ('ucitaj/{id}',      'VerzijaRadaController@postImage');
        
        //Rezervacija rada:
        Route::resource('rezervacija',      'RezervacijaRadaController');
        
        //Kronologija rada
        Route::get('kronologija/{id}',   'KronologijaController@show');
        
        //Odlucivanje u vezi rezervacije rada:
        Route::post ('odlucivanje/{id}',   'RezervacijaRadaOdlucivanjeController@store');

        //Komentari
        Route::resource ('komentar',     'KomentarController');
        Route::get ('komentar/{id}',     'KomentarController@show');
        Route::post ('komentar/{id}',     'KomentarController@store');


        Route::resource('statusi-rada',     'StatusRadaController');
        Route::resource('verzija-rada',     'VerzijaRadaController');
        Route::resource('status-verzije',   'StatusVerzijaController');
        Route::resource('stanje-rada',   'StanjeRadaController');


});


