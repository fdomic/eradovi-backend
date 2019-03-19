<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
  
    protected $fillable = ['id','korisnik_id','ime','prezime','oib','jmbag'];

}
