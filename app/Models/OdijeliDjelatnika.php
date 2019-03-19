<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OdijeliDjelatnika extends Model
{
    protected $table = 'odijeli_djelatnika';
  
    protected $fillable = ['id', 'odjel_id','djelatnik_id', 'naziv'];

}
