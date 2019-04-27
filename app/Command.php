<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public function commandDetails(){
        return $this->hasMany('App\CommandDetails', 'CommandId');
    }

    public function user(){
        return $this->belongsTo('App\User','UserId');
    }
}
