<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Djelatnik extends Model
{
    protected $table = 'djelatnici';

    protected $guarded = ['id'];

    protected $fillable = ['korisnik_id','ime','prezime','oib','jmbag'];
    
}
