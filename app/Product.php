<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Devuelve toda la categoria del producto
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Creamos una relacion uno a muchos (un producto muchas imagenes)
    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }
}
