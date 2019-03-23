<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StanjeRada extends Model
{
    
    protected $table = 'stanje_rada';
  
    protected $guarded = ['id'];

    protected $fillable = ['rad_id','statusi_rada_id','naziv'];
}
