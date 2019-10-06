<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
protected $fillable =[
    'user_id',
    'type',
    'description',
    'name',
    'email',
    'city',
    'country',
    'title'
];
public function user(){
    return $this->belongsTo('App\User');
}
public function follow(){
    return $this->belongsTo('App\User');
}
}
