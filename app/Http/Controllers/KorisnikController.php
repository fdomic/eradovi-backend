<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
       
    public function index()
    {
        $data = Korisnik::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new Korisnik();
        $model->email = $data['email'];
        $model->email = $data['zaporka'];
        $model->email = $data['aktivan'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
