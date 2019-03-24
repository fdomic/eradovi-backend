<?php

namespace App\Http\Controllers;
use App\Models\Rad;
use App\Models\StanjeRada;
use App\Models\PonudenaTema;
use App\Models\Djelatnik;
use Eastwest\Json\Exceptions\EncodeDecode;
use Illuminate\Http\Request;

class RezervacijaRadaOdlucivanjeController extends Controller
{
   
    

    public function store(Request $request)
    {   

        $id = $request->id;
        $status = $request->statusi_rada_id;
        $provjera = Rad::find($id);

            if($provjera == null){

                return response()->json([
                    'success'=>false,
                    'error' => 300,
                    'errorMsg' => 'Ovaj rad ne postoji'
                ]);

            }

            if($provjera->statusi_rada_id == 2){
                return response()->json([
                    'success'=>false,
                    'error' => 302,
                    'errorMsg' => 'Ovo stanje je vec promjenjeno u odbijeno'
                ]);
            }

            if($provjera->statusi_rada_id == 3){
                return response()->json([
                    'success'=>false,
                    'error' => 303,
                    'errorMsg' => 'Ovo stanje je vec promjenjeno u odobren'
                ]);
            }

            if($request->statusi_rada_id > 3){
                return response()->json([
                    'success'=>false,
                    'error' => 301,
                    'errorMsg' => 'Krivo stanje je odabrano'
                ]);
            }

       
        if($status == 2){

            $stanje = StanjeRada::find($id);
            $stanje->statusi_rada_id = $status;
            $stanje->save();

            $rad = PonudenaTema::where('rad_id', '=', $request->id)->first('id');
    
            $tema = PonudenaTema::find($rad->id);
            $tema->rad_id = null;
            $tema->save();


           /* Pomocu geta kada vraca listu podataka
           
           $rad = PonudenaTema::where('rad_id', '=', $request->id)->get('id');
    
            foreach (json_decode($rad) as $area) //pretvara listu u zeljeni objekt
            {
                $tema = PonudenaTema::find($area->id);
                $tema->rad_id = null;
                $tema->save();

            }
          */

            return response()->json([
                'success'=>true,
                'tema' => $stanje,
                'tema' => $tema
            ]);
            
        }

        if($status == 3){

            $stanje = StanjeRada::find($id);
            $stanje->statusi_rada_id = $status;
            $stanje->save();

            return $stanje;

        }

        
            
    }

}
