<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odjeli extends Model
{
    protected $table = 'odjeli';
  
    protected $fillable = ['id', 'fakultet_id', 'naziv'];

}
