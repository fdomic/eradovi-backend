<?php

namespace App\Http\Controllers;

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
        $data = Rad::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
	 $model = null;

     if(isset($data['id'])) {
         //UPDATE

         $model = Rad::find($data['id']);
         $model->fill($data);
         $model->save();

     } else {
         //CREATE

         $model = new Rad();
         $model->fill($data);
         $model->save();
         
         $StanjeRada = new StanjeRada();
         $StanjeRada->rad_id = $model['id'];
         $StanjeRada->fill($data['stanje_rada']);
         $StanjeRada->save();
       
     }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }


}
