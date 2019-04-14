<?php

namespace App\Http\Controllers;

use App\Models\PonudenaTema;
use App\Models\Rad;
use App\Models\Djelatnik;
use App\Models\Student;
use Auth;



use Illuminate\Http\Request;

class PonudenaTemaController extends Controller
{
    public function index()
    {
        $data = null;

        $podatak = null;
        $user = Auth::user();
        

       if($user->isStudent() == true) {
             
            $data = PonudenaTema::where('rad_id', '=', null )->get();
        
       } elseif($user->isProfesor() == true) {
           
            $data = PonudenaTema::where('rad_id', '=', null)->get();

        } elseif($user->isReferada() == true) {
            
            $data = PonudenaTema::where('rad_id', '=', null)->get();

        } else {
            return bad_request_response("Error - kriva korisnička grupa");
        }
        
        return success_response($data);
    }

    public function show($id)
    {   
        
        $data = null;

        $podatak = null;

        $data = PonudenaTema::find($id);
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
       
    }

    public function store(Request $request)
    {
    
        


        $data = $request->all();
        $model = null;
        $podatak = null;
        $user = Auth::user();

        if($user->isReferada() == true) {

            // Referada ona moze upisati rad za bilo kojeg profesora i studenta

            $data = $request->all();
            $model = null;

            if(isset($data['id'])) {
                //UPDATE
                $model = PonudenaTema::find($data['id']);
                $model->fill($data);
                $model->save();    
            } else {
                //CREATE
                $model = new PonudenaTema();
                $model->fill($data);
                $model->save();    
            }

           

        } 
        else 
        if($user->isProfesor() == true) {
            
             // Profesor moze upisati ponudenu temu samo za sebe   
             
             $podatak = Djelatnik::where('korisnik_id', '=', $user->id )->first('id');
            
             $data = $request->all();
             $model = null;
 
             if(isset($data['id'])) {
                 //UPDATE
                 $model = PonudenaTema::find($data['id']);
                 $model->fill($data);
                 $model->save();    
             } else {
                 //CREATE
                 $model = new PonudenaTema();
                 $model->korisnik_id = $podatak->id;
                 $model->fill($data);
                 $model->save();       
             }
 

        } 
        else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        return success_response($data);


    
    }

}
