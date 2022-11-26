<?php

namespace Controllers;

use Model\Producto;
use MVC\Router;

class HomeController
{
    public static function index(Router $router)
    {
        $categoria = $_GET['categoria'] ?? '';
        if (!empty($categoria)) {
            validateCategories();
            $consultaContenedor3 = "SELECT * FROM productos WHERE categoria = '$categoria'";
            $cartasCategoria = Producto::SQL($consultaContenedor3);
        } else {
            $cartasCategoria = [];
        }

        $consultaContenedor1 = "SELECT * FROM productos WHERE nombre LIKE '%legen%' ORDER BY id DESC LIMIT 3";
        $cartasLike = Producto::SQL($consultaContenedor1);

        $consultaContenedor2 = "SELECT * FROM productos ORDER BY id DESC LIMIT 3;";
        $cartasId = Producto::SQL($consultaContenedor2);

        /* Renderizar la vista */
        $router->render('home/index', [
            'title' => 'Home',
            'categoria' => $categoria,
            'cartasLike' => $cartasLike,
            'cartasId' => $cartasId,
            'cartasCategoria' => $cartasCategoria
        ]);
    }

    public static function validarUser()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (empty($_SESSION['login_user'])) {
            $data = array(
                'status'     => 'error',
                'code'         => 400,
                'message'     => 'Primero inicia sesión'
            );
        } else {
            $data = array(
                'status'     => 'success',
                'code'         => 200,
                'message'     => 'Ok'
            );
        }

        echo json_encode($data);
    }

    public static function platillo(Router $router)
    {
        if (!is_numeric($_GET['id'])) {
            header('Location: /404');
        }
        $producto = Producto::find($_GET['id']);
        
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // }

        /* Renderizar la vista */
        $router->render('home/platillo', [
            'title' => 'Platillo',
            'producto' => $producto
        ]);
    }

    public static function carrito(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        /* Renderizar la vista */
        $router->render('home/carrito', [
            'title' => 'Carrito',
        ]);
    }

    public static function pedidos(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        /* Renderizar la vista */
        $router->render('home/pedidos', [
            'title' => 'Mis Pedidos',
        ]);
    }

    public static function perfil(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        /* Renderizar la vista */
        $router->render('home/perfil', [
            'title' => 'Mi Pefil',
        ]);
    }
}
