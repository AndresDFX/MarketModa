<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request){


        $palabrabuscar = $request->get('palabrabuscar');
        $Productos = Product::where('nombre','like', '%'. $palabrabuscar.'%')->orderBy('nombre')->get();

        $resultados=[];

        foreach($Productos as $producto){
            $encontrartexto = stristr($producto->nombre, $palabrabuscar);
            $producto->encontrar = $encontrartexto;

            $recortar_palabra = substr($encontrartexto, 0 , strlen($palabrabuscar));
            $producto->substr = $recortar_palabra;

            $producto->name_negrita =  str_ireplace($palabrabuscar, "<b>$recortar_palabra</b>", $producto->nombre);

            $resultados[]= $producto;
        }

        return $resultados;



    }
}
