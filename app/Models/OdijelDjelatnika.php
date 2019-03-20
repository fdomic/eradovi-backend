<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdijelDjelatnika extends Model
{
    protected $table = 'odijel_djelatnika';
  
    protected $guarded = ['id'];

    protected $fillable = ['odjel_id','djelatnik_id', 'naziv'];

}
