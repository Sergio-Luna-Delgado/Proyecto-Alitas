<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\HomeController;
use Controllers\LoginController;
use Controllers\PageController;
use MVC\Router;

$router = new Router();

/* Pagina principal */
$router->get('/', [PageController::class, 'index']);
$router->post('/validarUser', [PageController::class, 'validarUser']); /* API */
$router->get('/nosotros', [PageController::class, 'nosotros']);
$router->get('/galeria', [PageController::class, 'galeria']);
$router->get('/menu', [PageController::class, 'menu']);
$router->get('/platillo', [HomeController::class, 'platillo']);
$router->post('/platillo', [HomeController::class, 'platillo']);
$router->post('/eliminarPlatillo', [HomeController::class, 'eliminarPlatillo']); /* API */

/* Crear una cuenta y confirmar por correo */
$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);
$router->get('/confirmar', [LoginController::class, 'confirmar']); /* email */

/* Olvidar y recuperar contraseña por correo */
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/reestablecer', [LoginController::class, 'reestablecer']); /* email */
$router->post('/reestablecer', [LoginController::class, 'reestablecer']); /* email */

/* Login */
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

/* Rutas del usuario */
$router->get('/carrito', [HomeController::class, 'carrito']);
$router->post('/comprar', [HomeController::class, 'comprar']);
$router->get('/pedidos', [HomeController::class, 'pedidos']);
$router->get('/perfil', [HomeController::class, 'perfil']);
$router->post('/perfil', [HomeController::class, 'perfil']);
$router->post('/password', [HomeController::class, 'password']); /* API */

/* Rutas del admin */
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/ordenes', [AdminController::class, 'orden']);
$router->post('/admin/estatus', [AdminController::class, 'estatus']); /* API */
$router->post('/admin/eliminar', [AdminController::class, 'eliminarOrden']); /* API */
$router->get('/admin/inventario', [AdminController::class, 'inventario']);
$router->post('/admin/inventario', [AdminController::class, 'inventario']);
$router->get('/admin/inventario/crear', [AdminController::class, 'crear']);
$router->post('/admin/inventario/crear', [AdminController::class, 'crear']);
$router->get('/admin/inventario/actualizar', [AdminController::class, 'actualizar']);
$router->post('/admin/inventario/actualizar', [AdminController::class, 'actualizar']);
$router->post('/admin/inventario/eliminar', [AdminController::class, 'eliminar']); /* API */
$router->get('/admin/reporte', [AdminController::class, 'reporte']);
$router->post('/admin/reporte', [AdminController::class, 'reporte']);
$router->get('/admin/reporte/imrpimir', [AdminController::class, 'imrpimir']);


/* Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador */
$router->comprobarRutas();