<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function crear(Router $router)
    {
        $usuario = new Usuario;
        $alertasInput = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sync($_POST);
            $alertasInput = $usuario->validarNuevaCuenta();

            /* Revisar que alerta este vacio */
            if (empty($alertasInput)) {
                /* Verificar que el usuario no este registrado */
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario) {
                    $alertasInput['nombreExiste'] = 'El Usuario ya existe';
                } else {
                    /* No esta registrado, hashear el password */
                    $usuario->hashPassword();
                    /* Eliminar password2 */
                    unset($usuario->password2);

                    $usuario->confirmado = '1';
                    $usuario->token = null;

                    /* Generar Token unico */
                    // $usuario->crearToken();
                    /* Enviar el email */
                    // $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    // $email->enviarConfirmacion();

                    /* Crear el usuario */
                    $resultado = $usuario->save();
                    
                    // if ($resultado) {
                    //     header('location: /mensaje');
                    // }

                    if ($resultado) {
                        header('location: /login');
                    }
                }
            }
        }

        /* Renderizar la vista */
        $router->render('auth/crear', [
            'title' => 'Crear Cuenta',
            'usuario' => $usuario,
            'alertasInput' => $alertasInput
        ]);
    }

    public static function mensaje(Router $router)
    {
        /* Renderizar la vista */
        $router->render('auth/mensaje', [
            'title' => 'Instrucciones',
        ]);
    }

    public static function confirmar(Router $router)
    {
        $alertas = [];

        $token = s($_GET['token']);
        if (!$token) header('Location: /');

        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            /* Mostrar mensaje de error */
            Usuario::setAlerta('error', 'Token NO válido');
        } else {
            /* Modificar al usuario confirmado */
            $usuario->confirmado = '1';
            $usuario->token = null;

            $usuario->save();
            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }

        /* Obtener alertas */
        $alertas = Usuario::getAlertas();

        /* Renderizar la vista */
        $router->render('auth/confirmar', [
            'title' => 'Confirmar contraseña',
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router)
    {
        $alertas = [];
        $alertasInput = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertasInput = $usuario->validarEmail();

            if (empty($alertas)) {
                /* Buscar el usaurio */
                $usuario = Usuario::where('email', $usuario->email);

                if ($usuario && $usuario->confirmado) {
                    /* Generar un nuevo token */
                    $usuario->crearToken();
                    /* Actualizar el usuario */
                    $usuario->save();
                    /* Enviar el email */
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();
                    /* Imprimir la alerta */
                    Usuario::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');
                } else {
                    Usuario::setAlerta('error', 'El Usuario no existe o no esta confirmado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        /* Renderizar la vista */
        $router->render('auth/olvide', [
            'title' => 'Olvide la Contraseña',
            'alertasInput' => $alertasInput,
            'alertas' => $alertas
        ]);
    }

    public static function reestablecer(Router $router)
    {
        $alertasInput = [];
        $token = s($_GET['token']);
        $mostrar = true;
        if (!$token) header('Location: /');

        /* Identificar el usuario con este token */
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token No válido');
            $mostrar = false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /* Añadir el nuevo password */
            $usuario->sync($_POST);
            /* Validar el password */
            $alertasInput = $usuario->validarPassword();

            if (empty($alertasInput)) {
                /* Hasear el nuevo password */
                $usuario->hashPassword();
                /* Elimar el token de un solo uso */
                $usuario->token = null;
                /* Guardar el usuario en la bd */
                $resultado = $usuario->save();
                /* Redireccionar */
                if ($resultado) {
                    header('Location: /login');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        /* Renderizar la vista */
        $router->render('auth/reestablecer', [
            'title' => 'Nueva contraseña',
            'alertasInput' => $alertasInput,
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }

    public static function login(Router $router)
    {
        $alertasInput = [];
        $auth = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->sync($_POST);

            $alertasInput = $auth->validarLogin();

            if (empty($alertasInput)) {
                /* verificar que el usuario exista */
                $usuario = Usuario::where('email', $auth->email);
                if (!$usuario || !$usuario->confirmado) {
                    $alertasInput['noUsuario'] = 'El usuario no existe o no esta confirmado';
                } else {
                    /* El usuario existe */
                    if (password_verify($_POST['password'], $usuario->password)) {
                        if ($usuario->admin) {
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            $_SESSION['login_admin'] = true;
                            header('Location: /admin');
                        } else {
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            $_SESSION['login_user'] = true;
                            $_SESSION['login_user_id'] = $usuario->id;
                            $_SESSION['login_user_name'] = $usuario->nombre;
                            header('Location: /');
                        }
                    } else {
                        $alertasInput['noPassword'] = 'Password incorrecto';
                    }
                }
            }
        }

        /* Renderizar la vista */
        $router->render('auth/login', [
            'title' => 'Inicia Sesion',
            'alertasInput' => $alertasInput,
            'auth' => $auth
        ]);
    }

    public static function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION = [];
        header('location: /login');
    }
}
