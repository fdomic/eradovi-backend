<?php

namespace App\Http\Controllers;

use App\Models\Djelatnik;
use Illuminate\Http\Request;


class DjelatnikController extends Controller
{
    
    public function index()
    {
        $data = Djelatnik::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new Djelatnik();
        $model->korisnik_id = $data['korisnik_id'];
        $model->ime = $data['ime'];
        $model->prezime = $data['prezime'];
        $model->oib = $data['oib'];
        $model->jmbag = $data['jmbag'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
