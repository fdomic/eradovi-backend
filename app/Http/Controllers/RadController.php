<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Rad;
use App\Models\StatusRada;
use App\Models\StanjeRada;
use App\Models\Student;
use App\Models\Djelatnik;
use Illuminate\Http\Request;

class RadController extends Controller
{
    public function index()
    {
        $data = null;

        $podatak = null;
        $user = Auth::user();
        
       if($user->isStudent() == true) {
            $korisnik = Student::where('korisnik_id', '=', $user->id )->first('id');
            $data = Rad::where('student_id', '=',$korisnik->id )->get();
            

        } elseif($user->isProfesor() == true) {
            $djelatnik = Djelatnik::where('korisnik_id', '=', $user->id)->first('id');
            $data = Rad::where('djelatnik_id', '=', $djelatnik->id)->get();
            

        } elseif($user->isReferada()) {
            
            $data = Rad::all();
            
        } else {
            return bad_request_response("Error - kriva korisnička grupa");
        }

        return success_response($data);
    }

    public function store(Request $request)
    {

        // Student može prijaviti samo rad za svoj id, ali može za bilo koji id profesora
        // Profesor može dodati rad samo za svoj id, alči može za bilo kojeg studenta
        // Referada može sve
        //Ako je greška odgovoriti s return unauthorized_response("Nema prava za akciju");


     $data = $request->all();
        
	 $model = null;

     if(isset($data['id'])) {
         //UPDATE

         $model = Rad::find($data['id']);
         $model->fill($data);
         $model->save();

     } else {
         //CREATE

         $model = new Rad();
         $model->fill($data);
         $model->save();
         
         $StanjeRada = new StanjeRada();
         $StanjeRada->rad_id = $model['id'];
         $StanjeRada->fill($data['stanje_rada']);
         $StanjeRada->save();
       
     }

        return response()->json([
            'success' => true,
            'data' => $model 
          ], 200);
    }


}
