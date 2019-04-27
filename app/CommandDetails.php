<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandDetails extends Model
{
    public function command(){
        return $this->belongsTo('App\Command', 'CommandId');
    }
}
