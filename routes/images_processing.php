<?php

//Crear una imagen para un usuario usando save
$imagen = new App\Image(['url'=> 'imagenes/avatar.png']);
$usuario = App\User::find(1);
$usuario->image()->save($imagen);


//Verificar si un usuario tiene image
$usuario = App\User::find(1);
$foto = $usuario->image;

if($foto){
    echo "Hay foto";
}else{
    echo "No hay foto";
}

//Obtener la informacion de la imagen atraves del usuario
$usuario = App\User::find(1);
return $usuario->image;


//Crear varias imagenes para un producto con savemany
$producto = App\Product::find(1);
$producto->images()->saveMany([

    new App\Image(['url' => 'imagenes/avatar.png']),
    new App\Image(['url' => 'imagenes/avatar2.png']),
    new App\Image(['url' => 'imagenes/avatar3.png']),

]);
return $producto->images;


//Actualizar una imagen para usuario
$usuario = App\User::find(1);
$usuario->image->url = 'imagenes/avatar2.png';
$usuario->push();
return $usuario->image;


//Guardar variables imagenes para el productos
$producto = App\Product::find(1);
$producto->images()->saveMany([

    new App\Image(['url' => 'imagenes/avatar.png']),
    new App\Image(['url' => 'imagenes/avatar2.png']),
    new App\Image(['url' => 'imagenes/avatar3.png']),

]);
return $producto->images;


//Actualizar una imagen de un producto
$producto = App\Product::find(1);
$producto->images[0]->url = 'imagenes/avatar3.png';
$producto->push();
return $producto->images;


//Buscar el registro relacionado a la imagen de productos o usuarios
$image = App\Image::find(1);
return $image->imageable;


//Delimitar la busqueda de imagenes de productos
$producto = App\Product::find(1);
return $producto->images()->where('url','imagenes/a.png')->get();


//Ordenar registros que provienen de la relacion
$producto = App\Product::find(1);
return $producto->images()->where('url', 'imagenes/a.png')->orderBy('id','Desc')->get();

//Contar los registros relacionados a usuario
$usuario = App\User::withCount('image')->get();
$usuario = $usuario->find(1);
return $usuario->image_count;

//Contar los registros relacionados a productos
$productos = App\Product::withCount('images')->get();
$productos = $productos->find(1);
return $productos->images_count;

//Carga previa de registros de todos los registros de productos
$productos = App\Product::with('images')->get();
return $productos;

//Carga previa de registros de un producto especifico
$productos = App\Product::with('images')->find(1);
return $productos;

//Carga previa de registros de todos los registros de usuarios
$usuario = App\User::with('image')->get();
return $usuario;

//Carga previa de registros de todos los registros de usuarios
$usuario = App\User::with('image')->find(1);
return $usuario;

//Carga previa de multiples relaciones  de todos los registros de productos
$productos = App\Product::with('images','category')->get();
return $productos;


//Carga previa de multiples relaciones  de un producto especifico
$productos = App\Product::with('images', 'category')->find(1);
return $productos;

//Delimitar los campos de una busquedad
$productos = App\Product::with('images:id,imageable_id,url','category:id,nombre,slug')->find(1);
return $productos;


//Eliminar una imagen de un producto
$productos = App\Product::find(1);
$productos->images[0]->delete();
return $productos;

//Eliminar todas las imagenenes de un producto
$productos = App\Product::find(1);
$productos->images()->delete();
return $productos;
