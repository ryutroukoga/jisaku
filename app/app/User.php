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
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function danger()
    {
        return $this->hasMany('App\Danger');
    }

    public function request()
    {
        return $this->hasMany('App\Request');
    }
}
