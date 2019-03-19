<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Djelatnik extends Model
{
    protected $table = 'djelatnik';

    protected $fillable = ['id','korisnik_id','ime','prezime','oib','jmbag'];
    
}
