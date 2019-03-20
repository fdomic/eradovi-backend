<?php

namespace App\Http\Controllers;

use App\Models\PonudenaTema;
use App\Models\Rad;
use App\Models\Djelatnik;

use Illuminate\Http\Request;

class PonudenaTemaController extends Controller
{
    public function index()
    {
        $data = PonudenaTema::all();
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
