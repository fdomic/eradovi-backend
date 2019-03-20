<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odjel extends Model
{
    protected $table = 'odjeli';

    protected $guarded = ['id'];
  
    protected $fillable = ['fakultet_id', 'naziv'];

}
