<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'ImageId';

    public function product(){
        return $this->belongsTo('App\Product','ProductId', 'ProductId');
    }

    public function categorie(){
        return $this->belongsTo('App\Catégorie','CatégorieId', 'CatégorieId');
    }

}
