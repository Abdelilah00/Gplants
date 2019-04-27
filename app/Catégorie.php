<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catégorie extends Model
{
    protected $primaryKey = 'CatégorieId';

    public function products(){
        return $this->belongsToMany('\App\Product', 'in_catégorie', 'CatégorieId', 'ProductId');
    }
    public function image(){
        return $this->hasOne('App\Image','CatégorieId');
    }
}
