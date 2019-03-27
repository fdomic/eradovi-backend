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

        } elseif($user->isReferada()) {
            
            $data = PonudenaTema::all();

        } else {
            return bad_request_response("Error - kriva korisnička grupa");
        }
        
        return success_response($data);
    }

    public function store(Request $request)
    {
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

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }


}
