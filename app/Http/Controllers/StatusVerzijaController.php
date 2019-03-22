<?php

namespace App\Http\Controllers;

use App\Models\StatusVerzija;
use Illuminate\Http\Request;

class StatusVerzijaController extends Controller
{
    public function index()
    {
        $data = StatusVerzija::all();
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
            $model = StatusVerzija::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new StatusVerzija();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
