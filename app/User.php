<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function command(){
        return $this->hasOne('App\Command','UserId');
    }
}
