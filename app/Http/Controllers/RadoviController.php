<?php

namespace App\Http\Controllers;

use App\Radovi;
use Illuminate\Http\Request;

class RadoviController extends Controller
{
    public function index()
    {
        $data = PonudeneTeme::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new PonudeneTeme();
        $model->student_id = $data['student_id'];
        $model->djelatnik_id = $data['djelatnik_id'];
        $model->statusi_rada = $data['statusi_rada_id'];
        $model->naziv_hr = $data['naziv_hr'];
        $model->opis_hr = $data['opis_hr'];
        $model->naziv_eng = $data['naziv_eng'];
        $model->opis_eng = $data['opis_eng'];
        $model->naziv_tal = $data['naziv_tal'];
        $model->opis_tal = $data['opis_tal'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }


}
