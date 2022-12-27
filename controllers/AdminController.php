<?php

namespace Controllers;

use Model\AdminOrden;
use Model\Producto;
use Model\Orden;
use MVC\Router;

use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController
{
    public static function index(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAdmin();

        // $fecha = date('Y-m-d', strtotime('+1 day'));
        // $fecha = filter_var($_GET['fecha'], FILTER_SANITIZE_NUMBER_INT) ?? date('Y-m-d');
        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        /* En ciertos navegadores (como brave) en el input de calendario hay una opcion de borrar y la url queda como 'admin?fecha=' lo cual provoca un error, por eso con este condicional evito que ocurra eso*/
        if (isset($_GET['fecha']) && $_GET['fecha'] == "") {
            header('location: /404');
        }

        $fechaArgs = explode('-', $fecha);
        /* Con esto prevengo que el admin invente meses o exceda los dias del mes */
        if (!checkdate($fechaArgs[1], $fechaArgs[2], $fechaArgs[0])) {
            header('location: /404');
        }

        /* Consultar la base de daots */
        $consulta = "SELECT o.id, o.hora, CONCAT(u.nombre, ' ', u.apellido) AS usuario, u.email, u.telefono, p.nombre AS producto, p.precio, o.cantidad, o.total, o.estatus ";
        $consulta .= "FROM ordenes o, usuarios u, ordenesproductos op, productos p ";
        $consulta .= "WHERE o.usuarioId=u.id AND op.ordenId=o.id AND op.productoId=p.id ";
        $consulta .= "AND o.fecha = '${fecha}'";

        // echo "<pre>";
        // var_dump($consulta);
        // echo "</pre>";
        // die();

        $pedidos = AdminOrden::SQL($consulta);

        /* Renderizar la vista */
        $router->render('admin/index', [
            'title' => 'Ordenes',
            'pedidos' => $pedidos,
            // 'pedidos' => [],
            'fecha' => $fecha
        ]);
    }

    public static function inventario(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAdmin();

        $productos = Producto::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            isAdmin();

            $productoBuscador = $_POST['producto'];
            $consulta = "SELECT * FROM productos WHERE nombre LIKE '%" . $productoBuscador . "%'";

            if(!empty($productoBuscador)) {
                $productos = Producto::SQL($consulta);
            }
        }

        /* Renderizar la vista */
        $router->render('admin/inventario', [
            'title' => 'Inventario',
            'productos' => $productos,
            'productoBuscador' => $productoBuscador ?? ''
        ]);
    }

    public static function crear(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAdmin();

        $producto = new Producto();

        $alertasInput = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            isAdmin();
            $producto->sync($_POST);
            $alertasInput = $producto->validar();

            /* Obtener la extencion de la imagen y validar que si sea una imagen */
            $extension = explode('.', $_FILES["foto"]['name']);
            /* Crear: Si esta vacio es un error | Actualizar: Si esta vacio no es necesario crear una nueva imagen */
            if (!empty($extension[1])) {
                if (in_array($extension[1], ['gif', 'png', 'jpg', 'jpeg'])) {
                    /* Salvar imagen en el objeto */
                    $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension[1];
                    $producto->setPhoto($nombreImagen);
                } else {
                    $alertasInput['noFormato'] = 'Formato de la imagen no valido';
                }
            }

            /* Es mejor que esta alerta esta aqui y no en el modelo */
            if (empty($producto->foto)) {
                $alertasInput['foto'] = 'Sube una imagen que represente al platillo';
            }

            if (empty($alertasInput)) {
                /* Guardar la imagen en el servidor */
                move_uploaded_file($_FILES["foto"]['tmp_name'], '../public/pictures/' . $producto->foto);
                /* Salvar producto en la bd */
                $producto->save();
                /* Volver atras */
                header('Location: /admin/inventario');
            }
        }

        /* Renderizar la vista */
        $router->render('admin/crear', [
            'title' => 'Crear Producto',
            'producto' => $producto,
            'alertasInput' => $alertasInput,
            'actualizar' => false
        ]);
    }

    public static function actualizar(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAdmin();

        if (!is_numeric($_GET['id'])) {
            header('Location: /404');
        }
        $producto = Producto::find($_GET['id']);

        /* Arreglo con mensaje de error */
        $alertasInput = Producto::getAlertas();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            isAdmin();
            $producto->sync($_POST);
            $alertasInput = $producto->validar();

            /* Obtener la extencion de la imagen y validar que si sea una imagen */
            $extension = explode('.', $_FILES["foto"]['name']);
            /* Crear: Si esta vacio es un error | Actualizar: Significa que no se va actualizar la foto */
            if (!empty($extension[1])) {
                if (in_array($extension[1], ['gif', 'png', 'jpg', 'jpeg'])) {
                    /* Salvar imagen en el objeto */
                    $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension[1];
                    $producto->setPhoto($nombreImagen);
                } else {
                    $alertasInput['noFormato'] = 'Formato de la imagen no valido';
                }
            }

            if (empty($alertasInput)) {
                /* Guardar la imagen en el servidor y borrar la anterior */
                if ($_FILES["foto"]['tmp_name']) {
                    move_uploaded_file($_FILES["foto"]['tmp_name'], '../public/pictures/' . $producto->foto);
                    $fotoAnterior = Producto::find($producto->id); /* $producto->foto es el obejto que estamos usando con el nuevo valor */
                    unlink("../public/pictures/" . $fotoAnterior->foto); /* $fotoAnterior->foto es la imagen anterior que esta en la bd */
                }
                /* Salvar producto en la bd */
                $producto->save();
                /* Volver atras */
                header('Location: /admin/inventario');
            }
        }

        /* Renderizar la vista */
        $router->render('admin/actualizar', [
            'title' => 'Actualizar Producto',
            'producto' => $producto,
            'alertasInput' => $alertasInput,
            'actualizar' => true
        ]);
    }

    /* Esta funcion lo manda llamar desde JS Fetch */
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; /* Este id lo traje desde el fetch */

            $producto = Producto::find($id);
            unlink("../public/pictures/" . $producto->foto);
            $producto->delete();

            $data = array(
                'status'     => 'success',
                'code'         => 200,
                'message'     => 'El producto se elimino correctamente'
            );

            echo json_encode($data);
        }
    }

    /* Esta funcion lo manda llamar desde JS Fetch */
    public static function estatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $estatus = $_POST['estatus'];

            $orden = Orden::find($id);
            $orden->estatus = $estatus;
            $orden->save();

            $data = array(
                'status'     => 'success',
                'code'         => 200,
                'message'     => 'El estado de la orden #' . $id . ' es ' . $estatus
            );

            echo json_encode($data);
        }
    }

    /* Esta funcion lo manda llamar desde JS Fetch */
    public static function eliminarOrden()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; /* Este id lo traje desde el fetch */

            $orden = Orden::find($id);
            $orden->delete();

            $data = array(
                'status'     => 'success',
                'code'         => 200,
                'message'     => 'La orden se elimino correctamente'
            );

            echo json_encode($data);
        }
    }
}
