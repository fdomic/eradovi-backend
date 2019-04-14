<?php

namespace App\Http\Controllers;

use App\Models\Fakultet;
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

    public function show($id)
    {
        

        $data = Fakultet::find($id);
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
            $model = Fakultet::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new Fakultet();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }


}
