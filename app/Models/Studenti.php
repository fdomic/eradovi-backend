<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studenti extends Model
{
    protected $table = 'studenti';
  
    protected $fillable = ['id','korisnik_id','ime','prezime','oib','jmbag'];

}
