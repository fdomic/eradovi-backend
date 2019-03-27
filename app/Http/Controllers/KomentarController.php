<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Komentar;
use App\Models\Rad;
use Illuminate\Http\Request;

class KomentarController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $data = $request->all();
            
        $model = null;

        if(isset($data['id'])) $model = Komentar::find($data['id']);
        else $model = new Komentar();

        $model->rad_id = $request->id;
        $model->student_id = $user->id; //TODO zaposlenik?
        $model->fill($data);
        $model->save();

        return success_response($model);

    }
}
