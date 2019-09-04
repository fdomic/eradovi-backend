<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Djelatnik extends Model
{
    protected $table = 'djelatnici';

    protected $guarded = ['id'];

    protected $fillable = ['korisnik_id','ime','prezime','oib','jmbag'];
    
    public function isStudent() {
        return false;
    }

    public function isReferada() {
        $djelatnik = OdijelDjelatnika::where('djelatnik_id', '=', $this->id)->where('naziv','=','Referada')->first('naziv');
        return $djelatnik != null;
    }
    
    public function isProfesor() {
        $djelatnik = OdijelDjelatnika::where('djelatnik_id', '=', $this->id)->where('naziv','<>','Referada')->first('naziv');
        return $djelatnik != null;
    }
    
}
