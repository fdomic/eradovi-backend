<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusiRada extends Model
{
    
    protected $table = 'statusi_rada';
  
    protected $fillable = ['id', 'naziv'];
}
