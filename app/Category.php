<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Devuelve todos los productos de una categoria
    public function products(){
        return $this->hasMany(Product::class);
    }
}
