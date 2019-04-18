<?php

namespace App\Http\Controllers;

use Auth;
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
        
        $user = Auth::user();

        
            
            $status = $request->statusi_rada_id;
            $provjera = Rad::find( $request->id);

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

        
            if($status == 3){ //odbijen

                $data = new StanjeRada();
                $data->rad_id = $request->id;
                $data->djelatnik_id =  $user->id;
                $data->statusi_rada_id = $status;
                $data->save();

                //Pomocu geta kada vraca listu podataka
            
            $rad = PonudenaTema::where('rad_id', '=', $request->id)->get('id');
        
                foreach (json_decode($rad) as $area) //pretvara listu u zeljeni objekt
                {
                    $tema = PonudenaTema::find($area->id);
                    $tema->rad_id = null;
                    $tema->save();

                }
            
                return response()->json([
                    'success'=>true,
                    'tema' => $data,
                ]);
                
            }

            if($status == 2){ // prihvacen 

              
                $data = new StanjeRada();
                $data->rad_id = $request->id;
                $data->djelatnik_id = $user->id;
                $data->statusi_rada_id = $status;
                $data->save();

                return response()->json([
                    'success'=>true,
                    'tema' => $data,
                ]);

            }
    
        
        
    }
}   
