<?php

namespace Model;

class AdminReporte extends ActiveRecord
{
    protected static $tabla = 'ordenesproductos';
    protected static $columnasDB = ['id', 'fecha', 'nombre', 'precio', 'catntidad', 'total'];
    
    public $id;
    public $precio;
    public $cantidad;
    public $total;
    public $fecha;
    public $nombre;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->cantidad = $args['cantidad'] ?? null;
        $this->total = $args['total'] ?? null;
        $this->fecha = $args['fecha'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
    }
}

