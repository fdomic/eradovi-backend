<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerzijaRada extends Model
{

    protected $table = 'verzije_radova';
    
    protected $guarded = ['id'];

    protected $fillable = ['rad_id','verzija_predanog_rada','datum_predaje','datum_pregleda','opis_dorade_studenta','opis_dorade_mentora','datoteka_ime','datoteka'];
}
