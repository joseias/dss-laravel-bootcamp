
## Chirper

  

### Descripción

El repositorio implementa **Chirper**, una aplicación de ejemplo desarrollada en [Laravel Bootcamp 11.x](https://laravel.com/docs/11.x).

  
  

Entre otras funcionalidades permite:

  

- registrar nuevos usuarios.

- editar los datos del perfil.

- crear, editar o borrar chirps.

- notificar a los usuarios sobre nuevos chirps. Se simula envío de correo electrónico escribiendo a archivo de logs **storage/logs/mail.log**

  

Se sugiere revisar migraciones, seeders, modelos, rutas, vistas, configuración de correo y logging, eventos, notificaciones y politicas entre otros.

  
>Notar que:
> el enlace [https://bootcamp.laravel.com/](https://bootcamp.laravel.com/) ha sido actualizado con la versión 12.x de Laravel.

  

### Pasos para replicar

  

Los siguientes pasos permiten ambientar el proyecto en Ubuntu 24.04

  

(1) instalar node y npm:

  

- ver dockerfile para instrucciones de instalación en Linux.

  

(2) instalar dependencias Laravel. Navegar a la carpeta del proyecto:

  

`composer install`

  

Los pasos 2.1 y 2.2 no son necesarios ya que el archivo **package.json** ya contiene las dependencias, entre ellas Laravel Breeze.

  

(2.1) añadir e instalar Breeze:

`composer require laravel/breeze:2.3.3 --dev`

  

(2.1) instalar Blade:

  

`php artisan breeze:install blade`

  

este comando creará varias elementos, incluidas vistas por defecto de la aplicación. Se recomienda reescribirlas con los archivos provistos.

  

(3) instalar dependencias de node.js:

  

`npm install`

  

si fallara, probar `rm -rf node_modules` y reintentar.

  

(4) configurar .env si fuera necesario (base de datos, etc.)

  

(5) lanzar migraciones y seeders:

`php artisan migrate`

`php artisan db:seed`

  

en la BD debería existir un usuario con email: jane@does.com y contraseña: dss123 que se puede utilizar para iniciar sesión.

  
  

(6) lanzar gestor de colas, servidor vite, etc.

  

- lanzar los comandos desde dentro de la carpeta del proyecto.

- se recomienda utilizar una terminal diferente para cada comando.

  

(6.1) lanzar gestor de colas:

  

`php artisan queue:work`

  

se utiliza para notificaciones, ver descripción de la aplicación.

  

(6.2) lanzar vite:

  

`npm run dev`

  

se utiliza para gestionar distribución de JavaScript, CSS, imágenes, etc.

  

(6.3) lanzar servidor:

  

`php artisan serve`

  

Si se está utilizando docker puede ser necesario añadir opción `--host 0.0.0.0`

  

(7) Navegar al URL de la aplicación.