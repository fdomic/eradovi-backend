<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultet extends Model
{
    protected $table = 'fakultet';
  
    protected $fillable = ['id', 'naziv'];

}
