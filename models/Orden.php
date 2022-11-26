<?php

namespace Model;

class Orden extends ActiveRecord
{
    /* Base de datos */
    protected static $tabla = 'ordenes';
    protected static $columnasDB = ['id', 'cantidad', 'total', 'estatus', 'fecha', 'hora', 'usuarioId'];

    public $id;
    public $cantidad;
    public $total;
    public $estatus;
    public $fecha;
    public $hora;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->cantidad = $args['cantidad'] ?? '';
        $this->total = $args['total'] ?? '';
        $this->estatus = $args['estatus'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
    }
}
