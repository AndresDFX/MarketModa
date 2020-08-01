<div align="justify">


<h1><u> MarketModa</u></h1>

Loading...


---
<h2><u>Requerimientos</u></h2>

- [PHP >= 7.2.5](https://www.php.net/downloads.php)
- [Laravel >= 7.22.4](https://laravel.com/docs/7.x)


---
<h2><u>Instalación</u></h2>

- Descargar los archivos necesarios (/vendor).
  
    ``` bash
    composer install
    ```

- Copiar el archivo ".env.example" y pegarlo con el nombre: ".env". Si estas en una terminal de bash, puedes ejecutar el siguiente comando.
  
    ``` bash
    cp .env.example .env
    ```

- Configurar el acceso a la BD en el archivo .env Si usas XAMPP, el username es root y puedes dejar el password vacío.


- Generar una nueva clave de Laravel y ejecutar las migraciones.
  
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

- Instalar las dependencias de VueJS y ejecutar el frontend.
  
    ``` bash
    npm install && npm run dev
    ```

- Iniciar el servidor.
  
    ``` bash
    php artisan serve
    ```

- Acceder a localhost:8000 en el navegador.


</div>
