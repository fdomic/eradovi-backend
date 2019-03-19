<?php

namespace App\Http\Controllers;

use App\OdijelDjelatnik;
use Illuminate\Http\Request;

class OdijelDjelatnikController extends Controller
{
   
       
    public function index()
    {
        $data = OdijelDjelatnik::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new OdijelDjelatnik();
        $model->odjel_id = $data['odjel_id'];
        $model->djelatnik_id = $data['djelatnik_id'];
        $model->naziv = $data['naziv'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
