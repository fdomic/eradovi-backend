<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PonudenaTema extends Model
{
    protected $table = 'ponudene_teme';
  
	protected $guarded = ['id','rad_id'];
	
    protected $fillable = ['djelatnik_id','naziv_hr','opis_hr','naziv_eng','opis_eng','naziv_tal','opis_tal'];


}
