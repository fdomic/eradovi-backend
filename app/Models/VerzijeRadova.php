<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerzijeRadova extends Model
{

    protected $table = 'statusi_rada';
  
    protected $fillable = ['id','radovi_id','verzija_predaog_rada','datum_predaje','datum_pregleda','opis_dorade_studenta','opis_dorade_mentora'];
}
