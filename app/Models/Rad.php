<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rad extends Model
{
    protected $table = 'radovi';
  
    protected $guarded = ['id'];

    protected $fillable = ['student_id','djelatnik_id','statusi_rada_id','naziv_hr','opis_hr','naziv_eng','opis_eng','naziv_tal','opis_tal'];

}
