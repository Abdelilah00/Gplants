<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $primaryKey = 'ColorId';

    public function products(){
        return $this->belongsToMany('\App\Product', 'have_a_color', 'ColorId', 'ProductId');
    }
}
