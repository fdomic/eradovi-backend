<?php

namespace App\Http\Controllers;

use App\Odjel;
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

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new Odjel();
        $model->fakultet_id = $data['fakultet_id'];
        $model->naziv = $data['naziv'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
