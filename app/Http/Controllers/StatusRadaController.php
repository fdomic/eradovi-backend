<?php

namespace App\Http\Controllers;

use App\Models\StatusRada;
use Illuminate\Http\Request;

class StatusRadaController extends Controller
{
           
    public function index()
    {
        $data = StatusRada::all();
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
            $model = StatusRada::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new StatusRada();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
