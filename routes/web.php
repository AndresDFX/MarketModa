<?php

use App\Product;
use App\Category;
use App\Image;
use App\User;
use Illuminate\Support\Facades\Gate;

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


Route::get('/prueba', function () {


    Gate::authorize('haveaccess', 'role.show');

    $user = User::find(1);
    return $user;


});


Route::resource('/role', 'RoleController')->names('role');

Route::resource('/user', 'UserController', ['except' => [
    'create', 'store'
]])->names('user');

Route::get('/api/users', function () {

    $users = User::all();
    return $users;
});


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

    //Retornar la caegoria de un producto
    //$prod = Product::find(1)->first();
    //return $prod;

    //Retornar todos los productos de una categoria
    //$cat = Category::find(1)->products;
    //return $cat;

    return view ('tienda.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('template.admin');
})->name('admin');

//Ruta que enlaza el controlador con los una url
Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');
Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');

//Button cancelar en edit y create
Route::get('cancelar/{ruta}',function($ruta){
    return redirect()->route($ruta)->with('cancelar', 'Accion cancelada');
})->name('cancelar');

