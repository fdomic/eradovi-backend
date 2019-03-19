<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odjel extends Model
{
    protected $table = 'fakultet';
  
    protected $fillable = ['id', 'fakultet_id', 'naziv'];

}
