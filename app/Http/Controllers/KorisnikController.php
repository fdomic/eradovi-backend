<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class KorisnikController extends Controller
{
    
    public function index()
    {
        $data = User::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }

    
    public function show($id)
    {
        $data = User::v;
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
       
    }

}
