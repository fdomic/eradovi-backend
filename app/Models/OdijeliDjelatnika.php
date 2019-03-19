<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OdijelDjelatnika extends Model
{
    protected $table = 'odijel_djelatnika';
  
    protected $fillable = ['id', 'odjel_id','djelatnik_id', 'naziv'];

}
