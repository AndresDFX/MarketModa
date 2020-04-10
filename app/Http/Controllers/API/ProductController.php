<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Libreria manejo de archivos
use Illuminate\Support\Facades\File;


use App\Product;
use App\Image;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        //Indica que ya existe en la base de datos ese producto
        if (Product::where('slug', $slug)->first()) {
            return 'Slug no disponible';
        } else {
            return 'Slug disponible';
        }
    }

    public function eliminarimagen($id)
    {
        $imagen = Image::find($id);
        $archivo = substr($imagen->url,1);
        $eliminar = File::delete($archivo);
        $imagen->delete();
        return "eliminado id:".$id. ' '.$eliminar ;
    }
}
