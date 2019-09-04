<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Rad;
use App\Models\StatusRada;
use App\Models\StanjeRada;
use App\Models\Student;
use App\Models\Djelatnik;
use Illuminate\Http\Request;

class RadController extends Controller
{
    public function index()
    {
        $data = null;
        $user = Auth::user()->getStudentOrProfesor();

        if($user->isReferada()) {

            $data = Rad::all();

        } 
        elseif($user->isProfesor() == true) {
           
            $data = Rad::where('djelatnik_id', '=', $user->id)->get();
   
        } 
        elseif($user->isStudent() == true) {

            $data = Rad::where('student_id', '=', $user->id )->get();
            
        } 
        else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        return success_response($data);
    }

    public function show($id)
    {
        $data = Rad::find($id);
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
       
    }

    public function store(Request $request)
    {

        // Student može prijaviti samo rad za svoj id, ali može za bilo koji id profesora
        // Profesor može dodati rad samo za svoj id, alči može za bilo kojeg studenta
        // Referada može sve
        //Ako je greška odgovoriti s return unauthorized_response("Nema prava za akciju");

        $data = $request->all();
        $model = null;
        $user = Auth::user()->getStudentOrProfesor();

        if($user->isReferada() == true) {

            // Referada ona moze upisati rad za bilo kojeg profesora i studenta
           
            if(isset($data['id'])) {
                //UPDATE
       
                $model = Rad::find($data['id']);
                $model->fill($data);
                $model->save();
       
            } else {
                //CREATE
       
                
                $model = new Rad();
                $model->djelatnik_id = $user->id;
                $model->fill($data);
                $model->save();
                
                $StanjeRada = new StanjeRada();
               
                $StanjeRada->rad_id = $model['id'];
                $StanjeRada->djelatnik_id = $user->id;
                $StanjeRada->fill($data['stanje_rada']);
                $StanjeRada->save();
              
            }
       
        } 
        elseif($user->isProfesor() == true) {
            
             // Profesor moze upisati rad za bilo kojeg studenta, ali samo na svoj id
        
             if(isset($data['id'])) {
                //UPDATE
       
                $model = Rad::find($data['id']);
                $model->fill($data);
                $model->save();
       
            } else {
                //CREATE
       
                $model = new Rad();
                $model->djelatnik_id = $user->id;
                $model->fill($data);
                $model->save();
                
                $StanjeRada = new StanjeRada();
                $StanjeRada->rad_id = $model['id'];
                $StanjeRada->djelatnik_id = $user->id;
                $StanjeRada->fill($data['stanje_rada']);
                $StanjeRada->save();
              
            }

        } 
        elseif($user->isStudent() == true) {

             // Student moze upisati rad za bilo kojeg profesora, ali samo na svoj id

            if(isset($data['id'])) {
               //UPDATE
      
               $model = Rad::find($data['id']);
               $model->fill($data);
               $model->save();
      
           } else {
               //CREATE
      
               $model = new Rad();
               $model->student_id = $user->id;
               $model->fill($data);
               $model->save();
               
               $StanjeRada = new StanjeRada();
               $StanjeRada->rad_id = $model['id'];
               $StanjeRada->student_id = $user->id;
               $StanjeRada->fill($data['stanje_rada']);
               $StanjeRada->save();
             
           }
 
        } 
        else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        return success_response($data);

    }
}
