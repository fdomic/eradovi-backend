<?php

namespace App\Http\Controllers;

use App\Models\PonudenaTema;
use App\Models\Rad;
use App\Models\StanjeRada;
use App\Models\Djelatnik;

use Illuminate\Http\Request;

class RezervacijaRadaController extends Controller
{
    public function index()
    {
        $rad = PonudenaTema::whereNull('rad_id')->get();
        return response()->json([
            'success' => true,
            'data' => $rad 
        ], 200);
    
    }

    public function show($id)
     {     
        $model = Rad::find($id);
          
  
        if($model == null){
          return response()->json([
              'success'=>false,
              'error' => 201,
              'errorMsg' => 'Ovaj rad ne postoji'
          ]);

        }
        
        if($user->isReferada() == true) {

            // Referada moze odluciti 
           
        
       
        } 
        elseif($user->isProfesor() == true) {
            
             // Profesor moze odluciti

             
        } 
        elseif($user->isStudent() == true) {

             // Student ceka odluku on nemoze odluciti

             return bad_request_response("Error - kriva korisnička grupa");
 
        } 
        else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        return success_response($data);



       

        if(isset($id) ) {

            if( $model['rad_id'] == null){
                $radovi = new Rad();
                $radovi->student_id = 1; // srediti id studenta //TODO nakon sigurnosti
                $radovi->djelatnik_id = $model['djelatnik_id'];
                $radovi->naziv_hr = $model['naziv_hr'];
                $radovi->opis_hr = $model['opis_hr'];
                $radovi->naziv_eng = $model['naziv_eng'];
                $radovi->opis_eng = $model['opis_eng'];
                $radovi->naziv_tal = $model['naziv_tal'];
                $radovi->opis_tal = $model['opis_tal'];
                $radovi->save();

                $model->rad_id = $radovi->id;
                $model->save();

                $StanjeRada = new StanjeRada();
                $StanjeRada->rad_id = $radovi->id;
                $StanjeRada->statusi_rada_id = 1;
                $StanjeRada->save();
            }
            else{
                return response()->json([
                    'success'=>false,
                    'error' => 200,
                    'errorMsg' => 'Ovaj rad je vec rezerviran'
                ]);
            }

        }

        return response()->json([
            'success' => true,
            'data' => $model 
        ], 200);

    }
    
}
