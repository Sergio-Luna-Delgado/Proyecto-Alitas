<?php

namespace Model;

class ActiveRecord
{

    /* Base de datos, como es estatica no se va a reescribir nunca */
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    /* Alertas y Mensajes */
    protected static $alertas = [];
    protected static $alertasInput = [];

    /* Definir la conexión a la BD - includes/database.php */
    public static function setDB($database)
    {
        self::$db = $database;
    }

    /* Coloca la alerta */
    public static function setAlerta($tipo, $mensaje)
    {
        static::$alertas[$tipo][] = $mensaje;
    }

    /* Validación */
    public static function getAlertas()
    {
        return static::$alertas;
    }

    /* Revisa que no exista ningun tipo de error */
    public function validate()
    {
        static::$alertas = [];
        return static::$alertas;
    }

    /* Consulta SQL para crear un objeto en Memoria */
    public static function QuerySQL($query)
    {
        /* Consultar la base de datos */
        $resultado = self::$db->query($query);

        /* Iterar los resultados */
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::createObject($registro);
        }

        /* liberar la memoria */
        $resultado->free();

        /* retornar los resultados */
        return $array;
    }

    /* Crea el objeto en memoria que es igual al de la BD */
    protected static function createObject($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    /* Identificar y unir los atributos de la BD */
    public function attributes()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    /* Sanitizar los datos antes de guardarlos en la BD */
    public function sanitizeAttributes()
    {
        $atributos = $this->attributes();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    /* Sincroniza BD con Objetos en memoria */
    public function sync($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    /* Registros - CRUD */
    public function save()
    {
        $resultado = '';
        if (!is_null($this->id)) {
            $resultado = $this->update();
        } else {
            $resultado = $this->create();
        }
        return $resultado;
    }

    /* Todos los registros */
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::QuerySQL($query);
        return $resultado;
    }

    /* Busca un registro por su id */
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE id = ${id}";
        $resultado = self::QuerySQL($query);
        return array_shift($resultado);
    }

    /* Busca un registro especificando su columna y un valor */
    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE ${columna} = '${valor}'";
        $resultado = self::QuerySQL($query);
        return array_shift($resultado);
    }

    /* Consulta Plana de SQL (utilizar cuando los metodos del modelo no son suficientes) */
    public static function SQL($query)
    {
        $resultado = self::QuerySQL($query);
        return $resultado;
    }

    /* Obtener Registros con cierta cantidad */
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";
        $resultado = self::QuerySQL($query);
        return array_shift($resultado); /* Crea un arreglo con el indice cero, evita hacer esto: cita[0]->hora SOLO TRAE UN SOLO RESULTADO*/
    }

    /* crea un nuevo registro */
    public function create()
    {
        /* Sanitizar los datos */
        $atributos = $this->sanitizeAttributes();

        /* Insertar en la base de datos */
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "') ";

        // return json_encode(['query' => $query]);

        /* Resultado de la consulta */
        $resultado = self::$db->query($query);
        return [
            'resultado' =>  $resultado,
            'id' => self::$db->insert_id
        ];
    }

    /* Actualizar el registro */
    public function update()
    {
        /* Sanitizar los datos */
        $atributos = $this->sanitizeAttributes();

        /* Iterar para ir agregando cada campo de la BD */
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        /* Consulta SQL */
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        /* Actualizar BD */
        $resultado = self::$db->query($query);
        return $resultado;
    }

    /* Eliminar un Registro por su ID */
    public function delete()
    {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    /* Subida de archivos */
    public function setPhoto($foto)
    {
        /* Elimina la foto previa */
        if (!is_null($this->id)) {
            // $this->borrarfoto();
        }

        /* Asignar el atributo de foto el nombre del archivo */
        if ($foto) {
            $this->foto = $foto;
        }
    }

    /* Eliminar el archivo */
    // public function borrarfoto()
    // {
    //     /* Comprobar si existe archivo */
    //     $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
    //     if ($existeArchivo) {
    //         unlink(CARPETA_IMAGENES . $this->imagen);
    //     }
    // }
}
