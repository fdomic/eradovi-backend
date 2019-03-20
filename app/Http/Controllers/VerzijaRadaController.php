<?php

namespace App\Http\Controllers;

use App\Models\VerzijaRada;
use App\Models\Rad;
use Illuminate\Http\Request;

class VerzijaRadaController extends Controller
{
       
    public function index()
    {
        $data = VerzijaRada::all();
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
            $model = VerzijaRada::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new VerzijaRada();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
