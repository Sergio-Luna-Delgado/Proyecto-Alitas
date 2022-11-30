<?php

namespace Model;

class AdminOrden extends ActiveRecord
{
    protected static $tabla = 'ordenesproductos';
    protected static $columnasDB = ['id', 'hora', 'usuario', 'email', 'telefono', 'producto', 'precio', 'cantidad', 'total', 'estatus'];
    
    public $id;
    public $hora;
    public $usuario;
    public $email;
    public $telefono;
    public $producto;
    public $precio;
    public $cantidad;
    public $total;
    public $estatus;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? null;
        $this->usuario = $args['usuario'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->telefono = $args['telefono'] ?? null;
        $this->producto = $args['producto'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->cantidad = $args['cantidad'] ?? null;
        $this->total = $args['total'] ?? null;
        $this->estatus = $args['estatus'] ?? null;
    }
}

