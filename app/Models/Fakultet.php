<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultet extends Model
{
    protected $table = 'fakulteti';

    protected $guarded = ['id'];
  
    protected $fillable = ['naziv'];

}
