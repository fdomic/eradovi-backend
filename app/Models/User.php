<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Models\Student;
use App\Models\Djelatnik;
use App\Models\OdijelDjelatnika;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims() {
        return [];
    }

    public function getStudentOrProfesor() {
        $korisnik = Student::where('korisnik_id', '=', $this->id )->first('id');
        if($korisnik == null) {
            $korisnik = Djelatnik::where('korisnik_id', '=', $this->id)->first('id');
        }
        return $korisnik;
    }
    
}

