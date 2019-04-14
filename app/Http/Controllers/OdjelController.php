<?php

namespace App\Http\Controllers;

use App\Models\Odjel;
use Illuminate\Http\Request;

class OdjelController extends Controller
{
       
    public function index()
    {
        $data = Odjel::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    
    public function show($id)
    {
        $data = Odjel::find($id);
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
            $model = Odjel::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new Odjel();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
