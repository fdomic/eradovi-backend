<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StanjeVerzijeRada extends Model
{
    
    protected $table = 'stanje_verzije_rada';
  
    protected $guarded = ['id'];

    protected $fillable = ['verzija_rada_id','student_id','djelatnik_id','status_verzije_id','datum'];

}
