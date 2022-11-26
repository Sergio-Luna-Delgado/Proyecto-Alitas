# Estructura del proyecto

## Carpetas
1. classes = guarda toda la programacion para el envio de correos
2. controllers = se programa toda la logica de la pagina para despues llamar a las vistas
3. includes = manda a llamar la conexion de la bd y las funciones que se usaran para el sistema
4. models = logica de datos
    * ActiveRecord es la clase padre
    * Los demas archivos representan una entidad de la base de datos
5. public = todo lo que el usuario vera en el deployment
    * index.php es el routing
6. src = imagenes, js y estilos scss

## Archivos
1. Composer = herramientas para php (variables de entorno y enviar correos)
2. Gulp = Pre-procesador scss/js tambien para comprimir imagenes
3. Package = Dependencias de SASS
4. Router = comprueba rutas y rederiza a la vista

## Cosas a tener en cuenta para el deplyoment
1. Revisar que las variables de entorno includes/.env
2. Agregar el archivo Procfile
3. Agregar el archivo public/.htaccess
4. Agregar el archivo .gitignore
5. Cambiar las rutas del localhost por las del produccion en el Email

## ¿Como empezar a trabajar por primera vez con el proyecto?
1. Instalar las dependecias de npm con el siguiente comando: `npm install`
2. Instalar las dependecias de composer con el siguiente comando: `composer update`

## Comandos de Gulp
1. Ejecutar en la terminal gulp para compilar scss y js: `npx gulp dev`
2. Ejecutar en la terminal gulp para convertir y comprimir imagenes: `npx gulp conversor`

## Comandos de PHP
1. Ejecutar en la terminal: `cd public`
2. Ejecutar en la terminal gulp para abir un server local: `php -S localhost:3000`
    * No recuerdo bien si es necesario instalar una extension en vs code, lo que si es que en la configuracion de vs code le tienes que indicar la carpeta xampp/php

## Antes de Programar
1. Seleccionar Fuente(s)
2. Seleccionar la paleta de colores
3. Crear la base de datos

## ¿Como se empezo a trabajar?
1. Crear el layout principal
2. En el public/index.php fui creando las rutas
3. Despues crear los controladores
4. Diseñar las vistas

## Vistas
1. Layout
2. Crear
3. Mensaje
4. Confirmar
5. Olvide
6. Reestablecer
7. Login
8. Ordenes
9. Inventario
10. Home

## ¿Donde use Bootstrap?
* En los contenedores
* Utilidades (my-5, p-0, text-center)
* Carrusel de fotos
* Offcanvas
* Tablas
* Cards