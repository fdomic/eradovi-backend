<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Korisnik;
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
        $model = null;

        if(isset($data['id'])) {
            //UPDATE
            $model = Student::find($data['id']);
            $model->fill($data);
            $model->save();
        } else {
            //CREATE

            $korisnik = new Korisnik();
            $korisnik->fill($data['korisnik']);
            $korisnik->save();
    
            $model = new Student();
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
