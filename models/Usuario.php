<?php

namespace Model;

class Usuario extends ActiveRecord
{
    /* Base de datos, crear espejo */
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email', 'password', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->passwordActual = $args['passwordActual'] ?? '';
        $this->passwordNuevo = $args['passwordNuevo'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    /* Mensajes de validacion para la cracion de la cuenta */
    public function validarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertasInput['nombre'] = 'El nombre es obligatorio';
        }
        
        if (!$this->apellido) {
            self::$alertasInput['apellido'] = 'Los apellidos son obligatorios';
        }

        if (!$this->telefono) {
            self::$alertasInput['telefono'] = 'El teléfono es obligatorio';
        }

        if (!$this->email) {
            self::$alertasInput['email'] = 'El correo es obligatorio';
        }

        if (!$this->password) {
            self::$alertasInput['password'] = 'El password es obligatorio';
        }

        if (!$this->password2) {
            self::$alertasInput['password2'] = 'El password repetido es obligatorio';
        }

        if (strlen($this->password) < 8) {
            self::$alertasInput['passwordCaracter'] = 'El password debe contener al menos 8 caracteres';
        }

        if ($this->password !== $this->password2) {
            self::$alertasInput['passwordDiferentes'] = 'Los Passwords son diferentes';
        }
        
        return self::$alertasInput;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken()
    {
        $this->token = uniqid();
    }

    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertasInput['email'] = 'El correo es obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertasInput['NoEmail'] = 'Email no válido';
        }

        return self::$alertasInput;
    }

    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertasInput['password'] = 'El password es obligatorio';
        }

        if (!$this->password2) {
            self::$alertasInput['password2'] = 'El password repetido es obligatorio';
        }

        if (strlen($this->password) < 8) {
            self::$alertasInput['passwordCaracter'] = 'El password debe contener al menos 8 caracteres';
        }

        if ($this->password !== $this->password2) {
            self::$alertasInput['passwordDiferentes'] = 'Los Passwords son diferentes';
        }

        return self::$alertasInput;
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertasInput['email'] = 'El correo es obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertasInput['NoEmail'] = 'Email no válido';
        }

        if (!$this->password) {
            self::$alertasInput['password'] = 'El password es obligatorio';
        }

        return self::$alertasInput;
    }

    public function comprobarPasswordAndVerificado($password)
    {
        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

    public function comprobarActualizarDatos() {
        if (!$this->nombre) {
            self::$alertasInput['nombre'] = 'El nombre es obligatorio';
        }
        
        if (!$this->apellido) {
            self::$alertasInput['apellido'] = 'Los apellidos son obligatorios';
        }

        if (!$this->telefono) {
            self::$alertasInput['telefono'] = 'El teléfono es obligatorio';
        }

        if (!$this->email) {
            self::$alertasInput['email'] = 'El correo es obligatorio';
        }

        return self::$alertasInput;
    }

    public function nuevo_password(): array
    {
        if (!$this->passwordActual) {
            self::$alertas['error'][] = 'El Password Actual no puede ir vacio';
        }
        if (!$this->passwordNuevo) {
            self::$alertas['error'][] = 'El Password Nuevo no puede ir vacio';
        }
        if (strlen($this->passwordNuevo < 6)) {
            self::$alertas['error'][] = 'El Password debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    public function comprobar_password(): bool
    {
        return password_verify($this->passwordActual, $this->password);
    }
}
