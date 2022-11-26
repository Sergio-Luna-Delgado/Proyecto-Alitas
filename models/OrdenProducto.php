<?php

namespace Model;

class OrdenProducto extends ActiveRecord
{
    protected static $tabla = 'ordenesproductos';
    protected static $columnasDB = ['id', 'ordenId', 'productoId'];

    public $id;
    public $ordenId;
    public $productoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->ordenId = $args['ordenId'] ?? '';
        $this->productoId = $args['productoId'] ?? '';
    }
}
