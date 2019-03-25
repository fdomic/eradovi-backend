<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Komentar;

use App\Models\VerzijaRada;
use App\Models\StanjeVerzijeRada;
use App\Models\StatusVerzija;

use App\Models\Rad;
use App\Models\StanjeRada;
use App\Models\StatusRada;


use Illuminate\Http\Request;

class KronologijaController extends Controller
{

    public function show($id)
    {
        $data = Array();
        
//------Ispis iz tablica Verzija rada (Stanja verzija rada)---------------------------------------------------------------
     
        $verzije = DB::table('verzije_radova')
            ->leftJoin('stanje_verzije_rada', 'verzije_radova.id', '=', 'stanje_verzije_rada.verzija_rada_id')
            ->leftJoin('statusi_verzija', 'statusi_verzija.id', '=', 'stanje_verzije_rada.status_verzije_id')
            ->where('verzije_radova.rad_id', "=", $id)
            ->get();
        foreach ($verzije as $verzija) {
            $zapis = Array(
                "labela" => $verzija->naziv,
                "datum" => $verzija->datum
            );

            if($verzija->datum != null){
                array_push($data, $zapis);
            }

        }

//------Ispis iz tablica Rad (Stanja rada)----------------------------------------------------------------------------
                    
        $verzije = DB::table('radovi')
                    ->leftJoin('stanje_rada', 'radovi.id', '=', 'stanje_rada.rad_id')
                    ->leftJoin('statusi_rada', 'statusi_rada.id', '=', 'stanje_rada.statusi_rada_id')
                    ->where('radovi.id', "=", $id)
                    ->get();
        foreach ($verzije as $verzija) {
            $zapis = Array(
                "labela" => $verzija->naziv,
                "datum" => $verzija->datum
            );

            if($verzija->datum != null){
                array_push($data, $zapis);
            }
        }

//------ Ispis iz Komentara (Komenatari na rada)--------------------------------------------------------------------------
                     
        $verzije = DB::table('radovi')
            ->leftJoin('komentari', 'radovi.id', '=', 'komentari.rad_id')
            ->where('radovi.id', "=", $id)
            ->get();
        foreach ($verzije as $verzija) {
            $zapis = Array(
                "labela" => $verzija->komentar,
                "datum" => $verzija->datum
            );

            if($verzija->datum != null){
                array_push($data, $zapis);
            }
        }

//---------------------------------------------------------------------------------------------------------------

//-------Sortiranje po datumu---------------------------------------------------------------------------------------------------
        
        foreach ($data as $key => $row)
        {
            $count[$key] = $row['datum'];
        }
        array_multisort($count, $data,SORT_DESC); 

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);

    
   
    }

}
