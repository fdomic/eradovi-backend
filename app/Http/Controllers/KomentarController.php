<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Komentar;
use App\Models\Rad;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $data = Komentar::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    
    public function show($id)
    {
        $data = Komentar::find($id);
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
        $user = Auth::user()->getStudentOrProfesor();



        if($user->isReferada() == true) {

            // Referada 
           
            if(isset($data['id'])) $model = Komentar::find($data['id']);
            else $model = new Komentar();

            $model->rad_id = $request->id;
            $model->djelatnik_id = $user->id; 
            $model->fill($data);
            $model->save();


        } 
        elseif($user->isProfesor() == true) {
             // Profesor

             
            if(isset($data['id'])) $model = Komentar::find($data['id']);
            else $model = new Komentar();

            $model->rad_id = $request->id;
            $model->djelatnik_id = $user->id; 
            $model->fill($data);
            $model->save();

            
        } 
        elseif($user->isStudent() == true) {
             // Student 

             
            if(isset($data['id'])) $model = Komentar::find($data['id']);
            else $model = new Komentar();

            $model->rad_id = $request->id;
            $model->student_id = $user->id; 
            $model->fill($data);
            $model->save();


        } 
        else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        return success_response($data);









    }
}
