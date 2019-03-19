<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radovi extends Model
{
    protected $table = 'radovi';
  
    protected $fillable = ['id','student_id','djelatnik_id','statusi_rada_id','naziv_hr','opis_hr','naziv_eng','opis_eng','naziv_tal','opis_tal'];

}
