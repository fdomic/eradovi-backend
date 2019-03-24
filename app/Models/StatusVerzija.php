<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusVerzija extends Model
{
    protected $table = 'Statusi_Verzija';
  
    protected $guarded = ['id'];

    protected $fillable = ['naziv'];
}
