<?php

namespace Model;

class Producto extends ActiveRecord
{
    /* Base de datos */
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'categoria', 'descripcion', 'precio', 'foto', 'inventario'];

    public $id;
    public $nombre;
    public $categoria;
    public $descripcion;
    public $precio;
    public $foto;
    public $inventario;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->foto = $args['foto'] ?? '';
        $this->inventario = $args['inventario'] ?? '';
    }

    /* Validar que ningun campo este vacio */
    public function validar()
    {
        if (!$this->nombre) {
            self::$alertasInput['nombre'] = 'El nombre del platillo es Obligatorio';
        }
        
        if (!$this->descripcion) {
            self::$alertasInput['descripcion'] = 'Agrega una descripcion al platillo';
        }
        
        if (!$this->precio) {
            self::$alertasInput['precio'] = 'Agrega un precio al platillo, o acaso es gratis?';
        }
        
        if (!is_numeric($this->precio)) {
            self::$alertasInput['precioNumero'] = 'El precio no es valido';
        }
        
        if (!$this->inventario) {
            self::$alertasInput['inventario'] = 'Establece al menos un minimo de platillo al inventario';
        }
        
        if (!is_numeric($this->inventario)) {
            self::$alertasInput['inventarioNumero'] = 'El inventario no es valido';
        }

        return self::$alertasInput;
    }
}
