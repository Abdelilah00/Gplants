<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductId';

    public function review(){
        return $this->hasOne('App\Review', 'ProductId');
    }
    public function images(){
        return $this->hasMany('App\Image', 'ProductId');
    }
    public function categories(){
        return $this->belongsToMany('\App\Catégorie', 'in_catégorie','ProductId','CatégorieId');
    }
    public function colors(){
        return $this->belongsToMany('\App\Color', 'have_a_color','ProductId','ColorId');
    }
}
