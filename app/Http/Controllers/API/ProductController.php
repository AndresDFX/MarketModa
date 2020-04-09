<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

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
}
