<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Rad;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
       
    public function index()
    {
        $data = Komentar::all();
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
            $model = Komentar::find($data['id']);
            $model->fill($data);
            $model->save();

        } else {
            //CREATE
            $model = new Komentar();
            $model->fill($data);
            $model->save();
            
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
