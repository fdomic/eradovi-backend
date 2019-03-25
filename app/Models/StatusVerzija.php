<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusVerzija extends Model
{
    protected $table = 'statusi_verzija';
  
    protected $guarded = ['id'];

    protected $fillable = ['naziv'];
}
