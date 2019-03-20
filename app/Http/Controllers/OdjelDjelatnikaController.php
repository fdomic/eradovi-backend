<?php

namespace App\Http\Controllers;

use App\Models\OdijelDjelatnika;
use Illuminate\Http\Request;

class OdjelDjelatnikaController extends Controller
{
   
       
    public function index()
    {
        $data = OdijelDjelatnika::all();
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
            $model = OdijelDjelatnika::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new OdijelDjelatnika();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
