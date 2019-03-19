<?php

namespace App\Http\Controllers;

use App\Komentari;
use Illuminate\Http\Request;

class KomentariController extends Controller
{
       
    public function index()
    {
        $data = Komentari::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new Komentari();
        $model->radovi_id = $data['radovi_id'];
        $model->student_id = $data['student_id'];
        $model->djelatnik_id = $data['djelatnik_id'];
        $model->komentar = $data['komentar'];
        $model->datum = $data['datum'];
       
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
