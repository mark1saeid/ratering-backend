<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    protected $fillable = [
        'id','token','username','full_name', 'birthday','gender','email', 'password', 'rating', 'phone','pp','bio','point',
        'created_at','updated_at',
    ];


    protected $hidden = [
        'password',
    ];


    protected $casts = [

    ];





    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getCreatedAtAttribute($attr) {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('M D, Y h:m A'); //Change the format to whichever you desire
    }
}
