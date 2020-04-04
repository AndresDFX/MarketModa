<?php

use App\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    /**Creando un dato de prueba en la route principal 
    $prod = new Product();
    $prod->nombre = 'Producto 1';
    $prod->slug = 'Producto 1';
    $prod->category_id = 1; //Producto de hombres
    $prod->descripcion_corta = 'Producto 1';
    $prod->descripcion_larga= 'Producto 1';
    $prod->especificaciones= 'Producto 1';
    $prod->datos_de_interes= 'Producto 1';
    $prod->estado= 'Nuevo';
    $prod->activo= 'Si';
    $prod->sliderprincipal= 'No';
    $prod->save();
    
    return $prod;
    */

    //Buscar un producto con su foreign key 
    //$prod = Product::find(1)->first();
    //return $prod;
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
