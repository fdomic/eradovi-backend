<?php

namespace App\Http\Controllers;

use App\VerzijeRadova;
use Illuminate\Http\Request;

class VerzijeRadovaController extends Controller
{
       
    public function index()
    {
        $data = VerzijeRadova::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new VerzijeRadova();
        $model->radovi_id = $data['radovi_id'];
        $model->verzija_predanog_rada = $data['verzija_predanog_rada'];
        $model->datum_predaje = $data['datum_predaje'];
        $model->datum_pregleda = $data['datum_pregleda'];
        $model->opis_dorade_studenta = $data['opis_dorade_studenta'];
        $model->opis_dorade_mentora = $data['opis_dorade_mentora'];

        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
