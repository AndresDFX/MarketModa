<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Configuramos que el campo url de la imagen pueda ser llenado de manera masiva
    protected $fillable = [
        'url',
    ];

    //Devuelve todos los datos del modelo al que esta asociada la imagen
    public function imageable(){
        return $this->morphTo();
    }


}
