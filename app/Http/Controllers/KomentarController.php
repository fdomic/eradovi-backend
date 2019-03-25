<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Rad;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
       
    public function index()
    {
        $data = Komentar::all();
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
            
            if($request->student_id > null  ){
                $model = Komentar::find($data['id']);;
                $model->rad_id = $request->id;
                $model->fill($data);
                $model->save();

            }
            else{
               
                if( $request->djelatnik_id > null){
                    $model = Komentar::find($data['id']);;
                    $model->rad_id = $request->id;
                    $model->fill($data);
                    $model->save();
    
                }
                else{
                    return response()->json([
                        'success'=>false,
                        'error' => 400,
                        'errorMsg' => 'Mora biti naznaceno tko komentira rad'
                    ]);
                }
            }

        } else {
            //CREATE

            if($request->student_id > null  ){
                $model = new Komentar();
                $model->rad_id = $request->id;
                $model->fill($data);
                $model->save();

            }
            else{
               
                if( $request->djelatnik_id > null){
                    $model = new Komentar();
                    $model->rad_id = $request->id;
                    $model->fill($data);
                    $model->save();
    
                }
                else{
                    return response()->json([
                        'success'=>false,
                        'error' => 400,
                        'errorMsg' => 'Mora biti naznaceno tko komentira rad'
                    ]);
                }
            }

        }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }
}
