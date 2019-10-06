<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable=[
        'user_id',
        'follower_id',
        'status'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function contact(){
        return $this->hasOne('App\contact');
    }
}
