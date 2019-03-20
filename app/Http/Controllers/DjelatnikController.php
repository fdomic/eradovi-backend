<?php

namespace App\Http\Controllers;

use App\Models\Djelatnik;
use App\Models\Korisnik;
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

        $model = null;

        if(isset($data['id'])) {
            //UPDATE
            $model = Djelatnik::find($data['id']);
            $model->fill($data);
            $model->save();
        } else {
            //CREATE

            $korisnik = new Korisnik();
            $korisnik->fill($data['korisnik']);
            $korisnik->save();
    
            $model = new Djelatnik();
            $model->fill($data);
            $model->korisnik_id = $korisnik->id;
            $model->save();
        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
