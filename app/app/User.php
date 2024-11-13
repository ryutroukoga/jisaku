<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $fillable = [
        'name',    
        'email',
        'password',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function dangers()
    {
        return $this->hasMany('App\Danger');
    }

    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}
