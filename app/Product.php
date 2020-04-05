<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Devuelve toda la categoria del producto
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
