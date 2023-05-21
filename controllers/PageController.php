<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;

class PageController
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
        $router->render('page/index', [
            'title' => 'Home',
            'categoria' => $categoria,
            'cartasLike' => $cartasLike,
            'cartasId' => $cartasId,
            'cartasCategoria' => $cartasCategoria
        ]);
    }

    public static function menu(Router $router)
    {
        $productos = Producto::all();

        $categorias = Producto::SQL("SELECT categoria from productos GROUP by categoria");

        /* Renderizar la vista */
        $router->render('page/menu', [
            'title' => 'Menu',
            'productos' => $productos,
            'categorias' => $categorias
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

    public static function nosotros(Router $router)
    {
        /* Renderizar la vista */
        $router->render('page/nosotros', [
            'title' => 'Sobre Nosotros',
        ]);
    }

    public static function galeria(Router $router)
    {
        /* Renderizar la vista */
        $router->render('page/galeria', [
            'title' => 'Galería',
        ]);
    }

}
