<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\StanjeRada;
use Illuminate\Http\Request;

class StanjeRadaController extends Controller
{

    public function index()
    {
        $sql = null;
        $user = Auth::user()->getStudentOrProfesor();

        if($user->isReferada()) {
            $sql = "select * from stanje_rada";
        }
        elseif($user->isProfesor() == true) {
            $sql = "select sr.* from stanje_rada AS sr JOIN radovi AS r ON r.id = sr.rad_id WHERE r.djelatnik_id=" . $user->id;
        }
        elseif($user->isStudent() == true) {
            $sql = "select sr.* from stanje_rada AS sr JOIN radovi AS r ON r.id = sr.rad_id WHERE r.student_id=2001" . $user->id;
        }
        else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        $data = DB::select(DB::raw($sql));
        return response()->json([
            'success' => true,
            'data' => $data
          ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new StanjeRada();
        $model->rad_id = $data['rad_id'];
        $model->statusi_rada_id = $data['statusi_rada_id'];
        
        $model->save();

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
