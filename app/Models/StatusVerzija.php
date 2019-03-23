<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusVerzija extends Model
{
    protected $table = 'statusi_serzija';
  
    protected $guarded = ['id'];

    protected $fillable = ['naziv'];
}
