<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','amount','detail','image','status','del_flg'];
    
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
