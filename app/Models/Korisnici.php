<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnici extends Model
{
    protected $table = 'korisnici';

    protected $fillable = ['id', 'korisnik','email','zaporka', 'aktivan'];
}
