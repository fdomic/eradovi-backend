<?php

namespace App\Http\Controllers;

use App\Models\StanjeVerzijeRada;
use Illuminate\Http\Request;

class StanjeVerzijeRadaController extends Controller
{
    
    public function index()
    {
        $data = StanjeVerzijeRada::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new StanjeVerzijeRada();
        $model->verzija_rada_id = $data['verzija_rada_id'];
        $model->status_verzije_id = $data['status_verzije_id'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

    
}
