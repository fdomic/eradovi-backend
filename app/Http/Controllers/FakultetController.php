<?php

namespace App\Http\Controllers;

use App\Fakultet;
use Illuminate\Http\Request;

class FakultetController extends Controller
{
   
     
    public function index()
    {
        $data = Fakultet::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new Fakultet();
        $model->naziv = $data['naziv'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }


}
