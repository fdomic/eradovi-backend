<?php

namespace App\Http\Controllers;

use App\Models\VerzijaRada;
use App\Models\Rad;       
use App\Models\StanjeVerzijeRada;
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
            
            
        $validator = Validator::make($request->all(), ['datoteka' => 'required|mimes:doc,docx,pdf,rtf']);
        
        if ($validator->passes()) {
            
            $imageName = $request->datoteka->getClientOriginalName();
            $request->datoteka->move($destinationPath, $imageName);
        }
        else{

            if($request->all() == null){
                return response()->json([
                    'success'=>false,
                    'error' => 101,
                    'errorMsg' => 'Polje za ucitanu datoteku je prezno'
                ]);
            }
            else{
                return response()->json([
                    'success'=>false,
                    'error' => 102,
                    'errorMsg' => 'Polje za ucitanu datoteku krivog je foramta'
                ]);
            }
        }

        //-------------------------------------------------------- 

    
        $brojTrenutnihVerzija = VerzijaRada::where('rad_id', '=', $rad->id)->count();
        $hostname = env("APP_URL", "");
        
        $model = new VerzijaRada();
        $model->rad_id = $rad->id;
        $model->datoteka_ime = $imageName;
        $model->datoteka = $hostname . "/" .   $destinationPath;
        $model->verzija_predanog_rada = $brojTrenutnihVerzija + 1;
        $model->save();
        
        $stanje = new StanjeVerzijeRada();
        $stanje->verzija_rada_id = $model['id'];
        $stanje->status_verzije_id = $request['status_verzije_id'];
        $stanje->save();

        $spremi = Rad::find($rad->id);
        $spremi->url = $hostname . "/" .   $destinationPath;
        $spremi->save();

       
        return response()->json([
            'success' => true,
            'data' => $model 
        ], 200);
    }
}
