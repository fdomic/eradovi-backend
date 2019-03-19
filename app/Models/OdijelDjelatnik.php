<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OdijelDjelatnik extends Model
{
    protected $table = 'odijel_djelatnik';
  
    protected $fillable = ['id', 'odjel_id','djelatnik_id', 'naziv'];

}
