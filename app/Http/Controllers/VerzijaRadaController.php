<?php

namespace App\Http\Controllers;

use App\Models\VerzijaRada;
use App\Models\Rad;
use Validator;
use Illuminate\Http\Request;

class VerzijaRadaController extends Controller
{
       
    public function index()
    {
        $data = VerzijaRada::all();
        return response()->json([
            'success' => true,
            'data' => $data 
          ], 200);
    }


    public function postImage(Request $request)
    {
        $id = $request->id;

        $rad = Rad::find($id);

        if($rad == null) {
            return response()->json([
                'success'=>false,
                'error' => 100,
                'errorMsg' => 'Krivi rad'
            ]);
        }


    // Rendom slova i brojevi ------------------------------
            function guidv4($data) 
            {
                assert(strlen($data) == 16);

                $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
                $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 

                return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
            }
        //--------------------------------------------------------

    // Put za spremanje datoteke------------------------------  
            $rendomPath = guidv4(openssl_random_pseudo_bytes(16));
            $destinationPath = 'radovi/'.$rendomPath ;
        //--------------------------------------------------------

    // Spremanje datoteke u bazu i fold-----------------------  
            $imageName = $request->datoteka->getClientOriginalName();
            $request->datoteka->move($destinationPath, $imageName);
        //-------------------------------------------------------- 

        $brojTrenutnihVerzija = VerzijaRada::where('rad_id', '=', $rad->id)->count();

        $model = new VerzijaRada();
        $model->rad_id = $rad->id;
        $model->datoteka_ime = $imageName;
        $model->datoteka =     $destinationPath;
        $model->verzija_predanog_rada = $brojTrenutnihVerzija + 1;
        
        $model->save();

        $hostname = env("APP_URL", "");
        $model->url = $hostname . "/" . $model->datoteka . "/" . $model->datoteka_ime;
    
        return response()->json([
            'success' => true,
            'data' => $model 
        ], 200);
    }
}
