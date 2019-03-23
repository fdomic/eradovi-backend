<?php

namespace App\Http\Controllers;

use App\Models\StanjeRada;
use Illuminate\Http\Request;

class StanjeRadaController extends Controller
{
       
    public function index()
    {
        $data = StanjeRada::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new StanjeRada();
        $model->rad_id = $data['rad_id'];
        $model->statusi_rada_id = $data['statusi_rada_id'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
