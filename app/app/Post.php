<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'amount', 'detail', 'image', 'status', 'del_flg'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function dangers()
    {
        return $this->hasMany('App\Danger', 'post_id', 'id');
    }
    public function applications()
    {
        return $this->hasMany('App\Danger', 'post_id', 'id');
    }
}
