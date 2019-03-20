<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentari';

    protected $guarded = ['id'];
  
    protected $fillable = ['rad_id','student_id','djelatnik_id','komentar','datum'];


}
