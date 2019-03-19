<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $data = Student::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new Student();
        $model->korisnik_id = $data['korisnik_id'];
        $model->ime = $data['ime'];
        $model->prezime = $data['prezime'];
        $model->oib = $data['oib'];
        $model->jmbag = $data['jmbag'];
        
        
        // sve nove koje imam dodam tu
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
