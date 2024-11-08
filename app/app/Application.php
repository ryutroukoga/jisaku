<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['detail', 'email', 'phone', 'DueDate'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
