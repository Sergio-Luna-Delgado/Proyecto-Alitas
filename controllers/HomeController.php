<?php

namespace Controllers;

use Model\Producto;
use Model\Orden;
use Model\OrdenProducto;
use Model\AdminOrden;
use Model\Usuario;
use MVC\Router;

class HomeController
{
    public static function platillo(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        /* Validar el id sea un numero */
        if (!is_numeric($_GET['id'])) {
            header('Location: /404');
        }

        /* Que exista el id */
        $producto = Producto::find($_GET['id']);
        if (empty($producto)) {
            header('Location: /404');
        }

        $alertasInput = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($producto->inventario < $_POST['cantidad']) {
                $alertasInput['cantidad'] = 'La cantidad seleccionada excede lo disponible en el inventario';
            } else {
                $total = $producto->precio * $_POST['cantidad'];
            }

            /* Revisar que alerta este vacio */
            if (empty($alertasInput)) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                /* Primer articulo */
                if (!isset($_SESSION['carrito'])) {
                    $carrito = array(
                        'id' => $producto->id,
                        'nombre' => $producto->nombre,
                        'foto' => $producto->foto,
                        'precio' => $producto->precio,
                        'cantidad' => $_POST['cantidad'],
                        'total' => $total
                    );
                    $_SESSION['carrito'][0] = $carrito;
                } else {
                    /* Hay mas de un articulo */

                    /* Me es mas facil trabajar con el carrito asignandole una variable */
                    $articulos = $_SESSION['carrito'];
                    $numeroProducto = count($articulos);

                    /* ForEach para saber si hay un articulo repetido en el carrito */
                    foreach ($articulos as $key => $articulo) {
                        if ($articulo['id'] == $producto->id) {
                            $nuevoCantidad = $articulo['cantidad'] + $_POST['cantidad'];
                            $nuevoTotal = $articulo['total'] + $total;

                            /* Si lo hay lo actualizo en la misma posicion donde se encontro el primer registro */
                            $carrito = array(
                                'id' => $producto->id,
                                'nombre' => $producto->nombre,
                                'foto' => $producto->foto,
                                'precio' => $producto->precio,
                                'cantidad' => $nuevoCantidad,
                                'total' => $nuevoTotal
                            );
                            $_SESSION['carrito'][$key] = $carrito;
                            $sw = true;
                        }
                    }

                    /* Si es falso significa que es un articulo nuevo y no se repite en el carrito */
                    if ($sw == false) {
                        $carrito = array(
                            'id' => $producto->id,
                            'nombre' => $producto->nombre,
                            'foto' => $producto->foto,
                            'precio' => $producto->precio,
                            'cantidad' => $_POST['cantidad'],
                            'total' => $total
                        );
                        $_SESSION['carrito'][$numeroProducto] = $carrito;
                    }
                }

                header('location: /carrito');
            }
        }

        /* Renderizar la vista */
        $router->render('home/platillo', [
            'title' => 'Platillo',
            'producto' => $producto,
            'alertasInput' => $alertasInput
        ]);
    }

    public static function carrito(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        /* Renderizar la vista */
        $router->render('home/carrito', [
            'title' => 'Carrito'
        ]);
    }

    /* Esta funcion lo manda llamar desde JS Fetch */
    public static function eliminarPlatillo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; /* Este id lo traje desde el fetch */

            if (!isset($_SESSION)) {
                session_start();
            }

            /* Me es mas facil trabajar con el carrito asignandole una variable */
            $articulos = $_SESSION['carrito'];

            /* For para buscar en el carrito */
            foreach ($articulos as $key => $articulo) {
                if ($articulo['id'] == $id) {
                    unset($_SESSION['carrito'][$key]);
                }
            }

            if ($_SESSION['carrito'] == null) {
                unset($_SESSION['carrito']);
            }

            $data = array(
                'status'     => 'success',
                'code'         => 200,
                'message'     => 'El platillo se elimino del carrito correctamente'
            );

            echo json_encode($data);
        }
    }

    /* Esta funcion lo manda llamar desde JS Fetch */
    public static function comprar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_SESSION)) {
                session_start();
            }
            $articulos = $_SESSION['carrito'];

            foreach ($articulos as $articulo) {

                $args = array (
                    'id' => null,
                    'cantidad' => $articulo['cantidad'],
                    'total' => $articulo['total'],
                    'estatus' => "Pendiente",
                    'fecha' => $_POST['dia'],
                    'hora' => $_POST['hora'],
                    'usuarioId' => $_SESSION['login_user_id']
                );

                /* Almacena la cita y devuelve el ID */
                $orden = new Orden($args);
                $nuevaOrden = $orden->save();
                $ordenId = $nuevaOrden['id'];

                $args2 = array (
                    'ordenId' => $ordenId,
                    'productoId' => $articulo['id']
                );

                $ordenProducto = new OrdenProducto($args2);
                $ordenProducto->save();

                $producto = Producto::find($articulo['id']);
                $producto->inventario = $producto->inventario - $articulo['cantidad'];
                $producto->save();

                unset($_SESSION['carrito']);
            }

            $data = array(
                'status'     => 'success',
                'code'         => 200,
                'message'     => '¡Compra Exitosa!'
            );

            echo json_encode($data);
        }
    }

    public static function pedidos(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        if (!isset($_SESSION)) {
            session_start();
        }

        /* Consultar la base de daots */
        $consulta = "SELECT p.nombre AS producto, p.precio, o.cantidad, o.total, o.estatus, o.fecha ";
        $consulta .= "FROM ordenes o, usuarios u, ordenesproductos op, productos p ";
        $consulta .= "WHERE o.usuarioId=u.id AND op.ordenId=o.id AND op.productoId=p.id ";
        $consulta .= "AND o.usuarioId = {$_SESSION['login_user_id']}";

        // echo "<pre>";
        // var_dump($consulta);
        // echo "</pre>";
        // die();

        $pedidos = AdminOrden::SQL($consulta);

        /* Renderizar la vista */
        $router->render('home/pedidos', [
            'title' => 'Mis Pedidos',
            'pedidos' => $pedidos
        ]);
    }

    public static function perfil(Router $router)
    {
        /* Validar que el usuario halla iniciado sesion */
        isAuth();

        $usuario = Usuario::find($_SESSION['login_user_id']);
        $alertasInput = [];
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sync($_POST);
            $alertasInput = $usuario->comprobarActualizarDatos();
            
            if(empty($alertasInput)) {
                /* Verificar que el correo no exista anteriormente */
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario && $existeUsuario->id !== $usuario->id) {
                    /* mensaje de error */
                    Usuario::setAlerta('error', 'Email no válido ya pertenece a otra cuenta');
                } else {
                    /* Guardar el usuario */
                    $usuario->save();
                    /* Asignar nombre nuevo a la barra */
                    $_SESSION['login_user_name'] = $usuario->nombre;
    
                    Usuario::setAlerta('exito', 'Guardado Correctamente');
                }
                $alertas = $usuario->getAlertas();
            }
        }

        /* Renderizar la vista */
        $router->render('home/perfil', [
            'title' => 'Mi Perfil',
            'usuario' => $usuario,
            'alertasInput' => $alertasInput,
            'alertas' => $alertas,
        ]);
    }

    /* Esta funcion lo manda llamar desde JS Fetch */
    public static function password()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $passwordActual = $_POST['passwordActual'];
            $passwordNuevo = $_POST['passwordNuevo'];

            $usuario = Usuario::find($_SESSION['login_user_id']);

            /* sincronizar con los datos del usuario */
            $usuario->sync($_POST);
            $alertas = $usuario->nuevo_password();

            if(empty($alertas)) {
                $resultado = $usuario->comprobar_password();

                if($resultado) {
                    /* Asignar el nuevo password */
                    $usuario->password = $usuario->passwordNuevo;

                    /* Eliminar propiedades no necesarias, aunque se puede dejar y no pasara nada ya que no se encuentran en el arreglo columnasDB */
                    unset($usuario->passwordActual);
                    unset($usuario->passwordNuevo);

                    /* hasear el nuevo Password */
                    $resultado = $usuario->hashPassword();

                    /* Guardar el usuario */
                    $resultado = $usuario->save();
                    if($resultado){
                        $data = array(
                            'status' 	=> 'success',
                            'code' 		=> 200,
                            'message' 	=> 'Password Guardado Correctamente'
                        );
                    }

                } else {
                    $data = array(
                        'status' 	=> 'error',
                        'code' 		=> 400,
                        'message' 	=> 'Password Actual Incorrecto'
                    );
                }
            } else {
                $data = array(
                    'status' 	=> 'error',
                    'code' 		=> 400,
                    'message' 	=> 'No se puede dejar campos vacios y/o el password nuevo debe contener al menos 8 caracteres'
                );
            }

            echo json_encode($data);
        }
    }
}
