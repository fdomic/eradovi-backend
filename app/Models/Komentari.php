<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentari extends Model
{
    protected $table = 'komentari';
  
    protected $fillable = ['id','radovi_id','student_id','djelatnik_id','komentar','datum'];


}
