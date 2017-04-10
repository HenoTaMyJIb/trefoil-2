<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
    ];

    /**
     *
     */
    public static function superAdmin()
    {
        return self::where('email', env('SUPER_ADMIN'))->first();
    }

    /**
     *
     */
    public static function admin()
    {
        return self::where('email', env('ADMIN'))->first();
    }

    /**
     *
     */
    public function club()
    {
        # code...
    }

    /**
     * 
     */
    public function isCoach()
    {
        # code...
    }
}
