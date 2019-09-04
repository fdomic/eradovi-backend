<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'studenti';
  
    protected $guarded = ['id'];
	
    protected $fillable = ['korisnik_id','ime','prezime','oib','jmbag'];
    
    public function isStudent() {
        return true;
    }

    public function isReferada() {
        return false;
    }
    
    public function isProfesor() {
        return false;
    }

}
