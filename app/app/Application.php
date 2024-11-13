<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['detail', 'email', 'phone', 'DueDate'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function posts()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
