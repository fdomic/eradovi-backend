<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    protected $table = 'korisnik';

    protected $fillable = ['id', 'korisnik','email','zaporka', 'aktivan'];
}
