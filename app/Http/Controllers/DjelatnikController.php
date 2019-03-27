<?php

namespace App\Http\Controllers;

use App\Models\Djelatnik;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class DjelatnikController extends Controller
{
    
    public function index()
    {
        $data = Djelatnik::all();

        return success_response($data);
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

            $pod = $request->get('users');
            
            $User = new User;
            $User->name = $pod['name'];      
            $User->email = $pod['email'];
            $User->password = Hash::make($pod['password']);
            $User->save();

            $model = new Djelatnik();
            $model->fill($data);
            $model->korisnik_id = $User->id;
            $model->save();

        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }

}
