<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakulteti extends Model
{
    protected $table = 'fakulteti';
  
    protected $fillable = ['id', 'naziv'];

}
