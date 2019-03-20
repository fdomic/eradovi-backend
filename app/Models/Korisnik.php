<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    protected $table = 'korisnici';

    protected $guarded = ['id', 'aktivan'];

    protected $fillable = ['email','zaporka'];
}
