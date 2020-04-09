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
