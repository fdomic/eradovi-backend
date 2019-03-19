<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PonudeneTeme extends Model
{
    protected $table = 'ponudene_teme';
  
    protected $fillable = ['id','radovi_id','djelatnik_id','naziv_hr','opis_hr','naziv_eng','opis_eng','naziv_tal','opis_tal'];


}
