<?php

namespace App\Http\Controllers;

use App\StatusiRada;
use Illuminate\Http\Request;

class StatusiRadaController extends Controller
{
           
    public function index()
    {
        $data = StatusiRada::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new StatusiRada();
        $model->naziv = $data['naziv'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
