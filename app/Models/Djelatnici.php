<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Djelatnici extends Model
{
    protected $table = 'djelatnici';

    protected $fillable = ['id','korisnik_id','ime','prezime','oib','jmbag'];
    
}
