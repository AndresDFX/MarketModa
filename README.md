# MarketModa


## Instrucciones de Instalacion

``` bash
# Descargar los archivos necesarios (/vendor)
composer install

# Instalar las dep y ejecutar
npm i && npm run dev

# Configurar el acceso a la BD en el archivo .env
# Si usas XAMPP, el username es root y puedes dejar el password vacío

# Hacer las migraciones
php artisan key:generate
php artisan migrate

# Iniciar el servidor 
php artisan serve

# acceder a localhost:8000 en el navegador