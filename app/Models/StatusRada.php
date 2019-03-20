<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusRada extends Model
{
    
    protected $table = 'statusi_rada';
  
    protected $guarded = ['id'];

    protected $fillable = ['naziv'];
}
